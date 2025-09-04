<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function editMayorMessage()
    {
        $mayorSetting = Setting::where('key', 'mayor_message')->first(['value', 'image']);

        $mayorMessage = $mayorSetting->value ?? null;
        $mayorImage   = $mayorSetting->image ?? null;
        return view('backend.settings.mayor_message.edit', compact('mayorMessage', 'mayorImage'));
    }

    public function updateMayorMessage(Request $request)
    {

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'value' => 'required|string',
        ]);
        $setting = Setting::updateOrCreate(
            ['key' => 'mayor_message'],
            ['value' => $request->value]
        );

        if ($request->image) {
              if (! empty($setting->image)) {
                unlink('documents/' . $setting->image);
            }
            $hash = md5(mt_rand());
            $setting->image = $request->image->storeAs('settings/mayor_message', $hash . '' . $setting->id);
            $setting->save();
        }

        return redirect()->back()->with('success', 'Message du maire mis à jour avec succès');
    }
}
