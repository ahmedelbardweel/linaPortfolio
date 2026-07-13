<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Traits\HandlesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSectionController extends Controller
{
    use HandlesImages;
    public function index()
    {
        $heroSections = HeroSection::latest()->get();
        return view('admin.hero.index', compact('heroSections'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'main_image'  => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:5120',
            'right_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:5120',
        ]);

        if ($request->hasFile('main_image')) {
            $result = $this->storeImage($request->file('main_image'), 'public');
            $data['main_image'] = $result['path'];
            $data['main_image_data'] = $result['data'];
        }
        if ($request->hasFile('right_image')) {
            $result = $this->storeImage($request->file('right_image'), 'public');
            $data['right_image'] = $result['path'];
            $data['right_image_data'] = $result['data'];
        }

        $data['title'] = 'Hero';
        $data['description'] = '';

        $hero = HeroSection::create($data);
        $this->cacheImageData('hero', $hero);
        foreach (['main_image', 'right_image'] as $col) {
            $val = $hero->{$col} ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                $dataCol = match ($col) {
                    'main_image' => 'main_image_data',
                    'right_image' => 'right_image_data',
                };
                $this->syncBlobUrl($hero->fresh(), $col, $dataCol);
            }
        }

        return redirect()->route('admin.hero.index')->with('success', 'Hero section created successfully.');
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $data = $request->validate([
            'main_image'  => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:5120',
            'right_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp,bmp|max:5120',
        ]);

        if ($request->hasFile('main_image')) {
            if ($hero->main_image) Storage::disk('public')->delete($hero->main_image);
            $result = $this->storeImage($request->file('main_image'), 'public');
            $data['main_image'] = $result['path'];
            $data['main_image_data'] = $result['data'];
        }

        if ($request->hasFile('right_image')) {
            if ($hero->right_image) Storage::disk('public')->delete($hero->right_image);
            $result = $this->storeImage($request->file('right_image'), 'public');
            $data['right_image'] = $result['path'];
            $data['right_image_data'] = $result['data'];
        }

        $hero->update($data);
        $this->cacheImageData('hero', $hero);

        // Upload existing (not yet synced) images to Blob
        foreach (['main_image', 'right_image'] as $col) {
            $val = $hero->{$col} ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                // Look up the corresponding data column
                $dataCol = match ($col) {
                    'main_image' => 'main_image_data',
                    'right_image' => 'right_image_data',
                };
                $this->syncBlobUrl($hero->fresh(), $col, $dataCol);
            }
        }

        return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully.');
    }

    public function destroy(HeroSection $hero)
    {
        foreach (['main_image', 'right_image'] as $col) {
            $val = $hero->{$col} ?? '';
            if ($val && !str_starts_with($val, 'https://')) {
                Storage::disk('public')->delete($val);
            }
        }
        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero section deleted successfully.');
    }

    public function toggle(HeroSection $hero)
    {
        $hero->update(['is_active' => !$hero->is_active]);
        return back()->with('success', 'Status updated.');
    }

    private function syncBlobUrl($hero, string $pathCol, string $dataCol): void
    {
        $binary = null;
        if ($data = $hero->{$dataCol} ?? '') {
            $binary = base64_decode(explode(',', $data, 2)[1] ?? '');
        }
        if (!$binary && ($path = $hero->{$pathCol} ?? '') && !str_starts_with($path, 'https://')) {
            $binary = Storage::disk('public')->get($path);
        }
        if (!$binary) return;

        $name = Str::slug(class_basename($hero)) . '-' . $hero->id . '-' . Str::random(8) . '.webp';
        $url = $this->uploadToBlob($binary, $name);
        if ($url) {
            $hero->update([$pathCol => $url]);
        }
    }
}
