<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::orderBy('order')->get();
        return view('admin.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required',
            'category' => 'required',
            'content'  => 'required',
        ]);

        Tip::create($data);

        return redirect()->route('admin.tips.index')->with('success', 'Tip created successfully.');
    }

    public function edit(Tip $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    public function update(Request $request, Tip $tip)
    {
        $data = $request->validate([
            'title'    => 'required',
            'category' => 'required',
            'content'  => 'required',
        ]);

        $tip->update($data);

        return redirect()->route('admin.tips.index')->with('success', 'Tip updated successfully.');
    }

    public function destroy(Tip $tip)
    {
        $tip->delete();

        return redirect()->route('admin.tips.index')->with('success', 'Tip deleted successfully.');
    }

    public function toggle(Tip $tip)
    {
        $tip->update(['is_active' => !$tip->is_active]);

        return back()->with('success', 'Tip status updated successfully.');
    }
}
