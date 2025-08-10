<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutUsRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        return view('dashboard.about-us.index', compact('aboutUs'));
    }

    public function updateAboutUs(AboutUsRequest $request)
    {

        if($request-)

        $aboutUs = AboutUs::first();

        $aboutUs->desc_ar = $request->desc_ar;
        $aboutUs->desc_en = $request->desc_en;
        $aboutUs->save();
        return redirect()->route('dashboard.aboutUs.index')->with('success', 'About us updated successfully');
    }
}
