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
        return view('admin.reels.create');
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
            $rules['video'] = 'required|mimes:mp4,mov,avi,webm,mkv,3gp,ogg,mpg,m4v,wmv,flv|max:3072';
        }

        $data = $request->validate($rules);

        if ($request->input('_direct_upload')) {
            $data['video_path'] = $request->input('video_path');
        } else {
            $data['video_path'] = $request->file('video')->store('reels', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $result = $this->storeImage($request->file('thumbnail'), 'public');
            $data['thumbnail'] = $result['path'];
            $data['thumbnail_data'] = $result['data'];
        }

        $data['order'] = $request->input('order', 0);
        $data['is_active'] = $request->boolean('is_active');

        Reel::create($data);

        return redirect()->route('admin.reels.index')->with('success', 'Reel created successfully.');
    }

    public function edit(Reel $reel)
    {
        return view('admin.reels.edit', compact('reel'));
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
            $rules['video'] = 'nullable|mimes:mp4,mov,avi,webm,mkv,3gp,ogg,mpg,m4v,wmv,flv|max:3072';
        }

        $data = $request->validate($rules);

        if ($request->input('_direct_upload')) {
            if ($request->input('video_path')) {
                $data['video_path'] = $request->input('video_path');
            }
        } elseif ($request->hasFile('video')) {
            Storage::disk('public')->delete($reel->video_path);
            $data['video_path'] = $request->file('video')->store('reels', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            if ($reel->thumbnail) {
                Storage::disk('public')->delete($reel->thumbnail);
            }
            $result = $this->storeImage($request->file('thumbnail'), 'public');
            $data['thumbnail'] = $result['path'];
            $data['thumbnail_data'] = $result['data'];
        }

        $data['order'] = $request->input('order', 0);
        $data['is_active'] = $request->boolean('is_active');

        $reel->update($data);

        return redirect()->route('admin.reels.index')->with('success', 'Reel updated successfully.');
    }

    public function destroy(Reel $reel)
    {
        Storage::disk('public')->delete($reel->video_path);

        if ($reel->thumbnail) {
            Storage::disk('public')->delete($reel->thumbnail);
        }

        $reel->delete();

        return redirect()->route('admin.reels.index')->with('success', 'Reel deleted successfully.');
    }

    public function toggle(Reel $reel)
    {
        $reel->update(['is_active' => !$reel->is_active]);

        return back()->with('success', 'Reel status updated successfully.');
    }
}
