<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        return view('dashboard.settings.index');
    }

    public function update(Request $request, $id)
    {
        
        return response()->json([
        'logo' => $request->file('logo'),
        'favicon' => $request->file('favico'),
    ]);
    }
}
