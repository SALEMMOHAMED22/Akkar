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

         if(array_key_exists('logo' , $data) && $data['logo'] != null){
            // delete old logo 
            ImageManger::deleteImage($setting->logo);
            $file_name = ImageManger::uploadImage('/storage/Dashboard/settings' , $data['logo'] , 'public');
            $data['logo'] = $file_name;
        }
        if(array_key_exists('favicon' , $data) && $data['favicon'] != null){
            // delete old favicon 
            ImageManger::deleteImage($setting->favicon);
            $file_name = ImageManger::uploadImage('/storage/Dashboard/settings' , $data['favicon'] , 'public');
            $data['favicon'] = $file_name;
        }
        if(array_key_exists('site_banner' , $data) && $data['site_banner'] != null){
            // delete old favicon 
            ImageManger::deleteImage($setting->favicon);
            $file_name = ImageManger::uploadImage('/storage/Dashboard/settings' , $data['favicon'] , 'public');
            $data['favicon'] = $file_name;
        }

        $setting->update($data);
        
         cache()->forget('site_settings');

        session()->flash('success' , 'Settings Updated Successfully');
        return redirect()->route('dashboard.settings.index');







        
    
    }
}
