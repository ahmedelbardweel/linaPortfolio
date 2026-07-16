<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Traits\HandlesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    use HandlesImages;
    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'image'       => 'required|image|mimes:webp|max:5120',
            'gradient'    => 'nullable',
        ], ['image.mimes' => __('Only WebP format is accepted.')]);

        $result = $this->storeImage($request->file('image'), 'public');
        $data['image_path'] = $result['path'];
        $data['image_data'] = $result['data'];

        $portfolio = Portfolio::create($data);
        $this->cacheImageData('portfolio', $portfolio);
        $this->syncImageToBlob($portfolio, 'image_path', 'image_data');

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'image'       => 'nullable|image|mimes:webp|max:5120',
            'gradient'    => 'nullable',
        ], ['image.mimes' => __('Only WebP format is accepted.')]);

        if ($request->hasFile('image')) {
            try {
                if ($portfolio->image_path) {
                    Storage::disk('public')->delete($portfolio->image_path);
                }
            } catch (\Exception $e) {}
            $result = $this->storeImage($request->file('image'), 'public');
            $data['image_path'] = $result['path'];
            $data['image_data'] = $result['data'];
        }

        $portfolio->update($data);
        $this->cacheImageData('portfolio', $portfolio);
        if ($request->hasFile('image')) {
            $this->syncImageToBlob($portfolio->fresh(), 'image_path', 'image_data');
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        try {
            if ($portfolio->image_path) {
                Storage::disk('public')->delete($portfolio->image_path);
            }
        } catch (\Exception $e) {}

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }

    public function toggle(Portfolio $portfolio)
    {
        $portfolio->update(['is_active' => !$portfolio->is_active]);

        return back()->with('success', 'Portfolio status updated successfully.');
    }
}
