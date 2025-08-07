<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Utils\ImageManger;

class SettingController extends Controller
{
    public function index()
    {

        return view('dashboard.settings.index');
    }

    public function update(SettingRequest $request, $id)
    {
      
        $data = $request->except(['_token' , '_method']);
        $setting = Setting::findOrFail($id);

      if(array_key_exists('logo_light', $data) && $data['logo_light'] != null){
    // delete old logo if exists
    if ($setting->logo_light) {
        ImageManger::deleteImage($setting->logo_light);
    }

    $file_name = ImageManger::uploadImage('/storage/Dashboard/settings', $data['logo_light'], 'public');
    $data['logo_light'] = $file_name;
}

if(array_key_exists('logo_dark', $data) && $data['logo_dark'] != null){
    if ($setting->logo_dark) {
        ImageManger::deleteImage($setting->logo_dark);
    }

    $file_name = ImageManger::uploadImage('/storage/Dashboard/settings', $data['logo_dark'], 'public');
    $data['logo_dark'] = $file_name;
}

if(array_key_exists('favicon', $data) && $data['favicon'] != null){
    if ($setting->favicon) {
        ImageManger::deleteImage($setting->favicon);
    }

    $file_name = ImageManger::uploadImage('/storage/Dashboard/settings', $data['favicon'], 'public');
    $data['favicon'] = $file_name;
}

if(array_key_exists('site_banner', $data) && $data['site_banner'] != null){
    if ($setting->site_banner) {
        ImageManger::deleteImage($setting->site_banner);
    }

    $file_name = ImageManger::uploadImage('/storage/Dashboard/settings', $data['site_banner'], 'public');
    $data['site_banner'] = $file_name;
}


        $setting->update($data);
        
         cache()->forget('site_settings');

        session()->flash('success' , 'Settings Updated Successfully');
        return redirect()->route('dashboard.settings.index');







        
    
    }


    
}
