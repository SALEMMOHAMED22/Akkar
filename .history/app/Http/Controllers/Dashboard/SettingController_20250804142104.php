<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {

        return view('dashboard.settings.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token' , '_method']);
        $setting = Setting::findOrFail($id);

         if(array_key_exists('logo' , $data) && $data['logo'] != null){
            // delete old logo 
            Image->deleteImageFromLocal($setting->logo);
            $file_name = $this->imageManger->uploadSingleImage('/' , $data['logo'] , 'settings');
            $data['logo'] = $file_name;
        }
        if(array_key_exists('favicon' , $data) && $data['favicon'] != null){
            // delete old favicon 
            $this->imageManger->deleteImageFromLocal($setting->favicon);
            $file_name = $this->imageManger->uploadSingleImage('/' , $data['favicon'] , 'settings');
            $data['favicon'] = $file_name;
        }


        
    
    }
}
