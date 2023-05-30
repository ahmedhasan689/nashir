<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::query()->get();

        return view('dashboard.settings.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Setting::query()->findOrFail($id);

        return view('dashboard.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::query()->findOrFail($id);

        $request->validate([
            'value' => 'required',
        ]);

        if( $request->image ) {
            if( $request->hasFile('value') ) {
                $file = $request->file('value');

                $request->value = $file->store('/uploads/settings', [
                    'disk' => 'public'
                ]);
            }
        }

        $setting->update([
            'value' => $request->value,
        ]);

        toastr()->success(__('lang.setting_updated'));

        return redirect()->route('setting.index');
    }
}
