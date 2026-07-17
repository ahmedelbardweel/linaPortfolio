<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\HandlesImages;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use HandlesImages;

    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fileKeys = [];
        foreach ($request->except('_token', '_method') as $key => $value) {
            if ($request->hasFile($key)) {
                $fileKeys[] = $key;
            }
        }

        if ($fileKeys) {
            $rules = [];
            $msgs = [];
            foreach ($fileKeys as $k) {
                $rules[$k] = 'image|mimes:jpeg,png,gif,webp|max:5120';
                $msgs["$k.mimes"] = __('Only JPG, PNG, GIF, or WebP formats are accepted.');
            }
            $request->validate($rules, $msgs);
        }

        foreach ($request->except('_token', '_method') as $key => $value) {
            if ($request->hasFile($key)) {
                $result = $this->storeImage($request->file($key), 'public', 300, 300, true);
                Setting::set($key, $result['data']);
            } else {
                Setting::set($key, $value);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
