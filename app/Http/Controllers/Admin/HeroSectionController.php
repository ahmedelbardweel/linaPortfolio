<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
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
            $data['main_image'] = $request->file('main_image')->store('hero', 'public');
        }
        if ($request->hasFile('right_image')) {
            $data['right_image'] = $request->file('right_image')->store('hero', 'public');
        }

        $data['title'] = 'Hero';
        $data['description'] = '';

        HeroSection::create($data);

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
            $data['main_image'] = $request->file('main_image')->store('hero', 'public');
        }

        if ($request->hasFile('right_image')) {
            if ($hero->right_image) Storage::disk('public')->delete($hero->right_image);
            $data['right_image'] = $request->file('right_image')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully.');
    }

    public function destroy(HeroSection $hero)
    {
        if ($hero->main_image) Storage::disk('public')->delete($hero->main_image);
        if ($hero->right_image) Storage::disk('public')->delete($hero->right_image);
        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero section deleted successfully.');
    }

    public function toggle(HeroSection $hero)
    {
        $hero->update(['is_active' => !$hero->is_active]);
        return back()->with('success', 'Status updated.');
    }
}
