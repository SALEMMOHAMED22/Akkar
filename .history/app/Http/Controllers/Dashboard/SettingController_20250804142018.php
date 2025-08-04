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

        


        
    
    }
}
