<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reel;
use App\Traits\HandlesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReelController extends Controller
{
    use HandlesImages;
    public function index()
    {
        $reels = Reel::orderBy('order')->get();
        return view('admin.reels.index', compact('reels'));
    }

    public function create()
    {
        return view('admin.reels.create', $this->blobUploadUrls());
    }

    public function store(Request $request)
    {
        $rules = [
            'title'       => 'required',
            'description' => 'nullable',
        ];

        if ($request->input('_direct_upload')) {
            $rules['video_path'] = 'required|url';
        } else {
            $rules['video'] = 'required|mimes:mp4,mov,avi,webm,mkv,3gp,ogg,mpg,m4v,wmv,flv|max:3500';
        }

        $data = $request->validate($rules);

        if ($request->input('_direct_upload')) {
            $data['video_path'] = $request->input('video_path');
        } else {
            $file = $request->file('video');
            $binary = file_get_contents($file->getRealPath());
            $name = 'reels/reel_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $file->getClientOriginalExtension();
            $mime = $file->getClientMimeType() ?: 'video/mp4';
            $url = $this->uploadToBlob($binary, $name, $mime);
            if ($url) {
                $data['video_path'] = $url;
            } else {
                $data['video_path'] = $file->store('reels', 'public');
            }
        }

        if ($request->hasFile('thumbnail')) {
            $result = $this->storeImage($request->file('thumbnail'), 'public');
            $data['thumbnail'] = $result['path'];
            $data['thumbnail_data'] = $result['data'];
        }

        $data['order'] = $request->input('order', 0);
        $data['is_active'] = $request->boolean('is_active');

        $reel = Reel::create($data);
        if ($request->hasFile('thumbnail')) {
            $this->cacheImageData('reel', $reel);
            $this->syncImageToBlob($reel, 'thumbnail', 'thumbnail_data');
        }

        return redirect()->route('admin.reels.index')->with('success', 'Reel created successfully.');
    }

    public function edit(Reel $reel)
    {
        return view('admin.reels.edit', array_merge(compact('reel'), $this->blobUploadUrls()));
    }

    public function update(Request $request, Reel $reel)
    {
        $rules = [
            'title'       => 'required',
            'description' => 'nullable',
        ];

        if ($request->input('_direct_upload')) {
            $rules['video_path'] = 'nullable|url';
        } else {
            $rules['video'] = 'nullable|mimes:mp4,mov,avi,webm,mkv,3gp,ogg,mpg,m4v,wmv,flv|max:3500';
        }

        $data = $request->validate($rules);

        if ($request->input('_direct_upload')) {
            if ($request->input('video_path')) {
                $data['video_path'] = $request->input('video_path');
            }
        } elseif ($request->hasFile('video')) {
            try {
                if ($reel->video_path && !str_starts_with($reel->video_path, 'https://')) {
                    Storage::disk('public')->delete($reel->video_path);
                }
            } catch (\Exception $e) {}
            $file = $request->file('video');
            $binary = file_get_contents($file->getRealPath());
            $name = 'reels/reel_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $file->getClientOriginalExtension();
            $mime = $file->getClientMimeType() ?: 'video/mp4';
            $url = $this->uploadToBlob($binary, $name, $mime);
            if ($url) {
                $data['video_path'] = $url;
            } else {
                $data['video_path'] = $file->store('reels', 'public');
            }
        }

        if ($request->hasFile('thumbnail')) {
            try {
                if ($reel->thumbnail) {
                    Storage::disk('public')->delete($reel->thumbnail);
                }
            } catch (\Exception $e) {}
            $result = $this->storeImage($request->file('thumbnail'), 'public');
            $data['thumbnail'] = $result['path'];
            $data['thumbnail_data'] = $result['data'];
        }

        $data['order'] = $request->input('order', 0);
        $data['is_active'] = $request->boolean('is_active');

        $reel->update($data);
        if ($request->hasFile('thumbnail')) {
            $this->cacheImageData('reel', $reel);
            $this->syncImageToBlob($reel->fresh(), 'thumbnail', 'thumbnail_data');
        }

        return redirect()->route('admin.reels.index')->with('success', 'Reel updated successfully.');
    }

    public function destroy(Reel $reel)
    {
        try {
            if ($reel->video_path) {
                Storage::disk('public')->delete($reel->video_path);
            }
        } catch (\Exception $e) {}

        try {
            if ($reel->thumbnail) {
                Storage::disk('public')->delete($reel->thumbnail);
            }
        } catch (\Exception $e) {}

        $reel->delete();

        return redirect()->route('admin.reels.index')->with('success', 'Reel deleted successfully.');
    }

    public function toggle(Reel $reel)
    {
        $reel->update(['is_active' => !$reel->is_active]);

        return back()->with('success', 'Reel status updated successfully.');
    }

    private function blobUploadUrls(): array
    {
        $token = env('BLOB_READ_WRITE_TOKEN');
        if (!$token) {
            return ['blobUploadUrl' => null, 'blobPublicUrl' => null];
        }

        $filename = 'reel_' . time() . '_' . bin2hex(random_bytes(4)) . '.mp4';
        $body = json_encode([
            'path' => 'reels/' . $filename,
            'options' => ['access' => 'public'],
        ]);

        $ctx = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Authorization: Bearer $token\r\nContent-Type: application/json\r\n",
                'content' => $body,
                'timeout' => 10,
                'ignore_errors' => true,
            ],
        ]);

        $response = @file_get_contents('https://api.vercel.com/v1/blob/upload-url', false, $ctx);
        if ($response === false) {
            return ['blobUploadUrl' => null, 'blobPublicUrl' => null];
        }

        $data = json_decode($response, true);
        return [
            'blobUploadUrl' => $data['uploadUrl'] ?? null,
            'blobPublicUrl' => $data['url'] ?? null,
        ];
    }
}
