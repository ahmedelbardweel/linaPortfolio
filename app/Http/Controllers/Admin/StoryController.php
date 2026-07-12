<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Traits\HandlesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    use HandlesImages;
    public function index()
    {
        $stories = Story::orderBy('order')->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required',
            'content'  => 'required',
            'type'     => 'required|in:visual,text,mixed',
            'bg_color' => 'nullable',
            'image'    => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $result = $this->storeImage($request->file('image'), 'public');
            $data['image_path'] = $result['path'];
            $data['image_data'] = $result['data'];
        }

        Story::create($data);

        return redirect()->route('admin.stories.index')->with('success', 'Story created successfully.');
    }

    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $data = $request->validate([
            'title'    => 'required',
            'content'  => 'required',
            'type'     => 'required|in:visual,text,mixed',
            'bg_color' => 'nullable',
            'image'    => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            if ($story->image_path) {
                Storage::disk('public')->delete($story->image_path);
            }
            $result = $this->storeImage($request->file('image'), 'public');
            $data['image_path'] = $result['path'];
            $data['image_data'] = $result['data'];
        }

        $story->update($data);

        return redirect()->route('admin.stories.index')->with('success', 'Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        if ($story->image_path) {
            Storage::disk('public')->delete($story->image_path);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')->with('success', 'Story deleted successfully.');
    }

    public function toggle(Story $story)
    {
        $story->update(['is_active' => !$story->is_active]);

        return back()->with('success', 'Story status updated successfully.');
    }
}
