<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $aboutUs = About
        return view('dashboard.about-us.index');
    }
}
