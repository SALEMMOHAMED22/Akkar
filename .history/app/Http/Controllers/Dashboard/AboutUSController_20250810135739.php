<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        return view('dashboard.about-us.index' , compact('aboutUs'));
    }


    pub
}
