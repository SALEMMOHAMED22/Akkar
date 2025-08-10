<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AboutUs;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutUsRequest;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        return view('dashboard.about-us.index', compact('aboutUs'));
    }

    public function updateAboutUs(AboutUsRequest $request)
    {
        $aboutUs = AboutUs::first();

        if(isset($request->image)){
            $image = $request->file('image');

            if($aboutUs->image){
                ImageManger::deleteImage($aboutUs->image);
            }

            $path =  ImageManger::uploadImage('storage/general', $image, 'public');
            $request->image = $path;
        }els
        


        $aboutUs->title_ar = $request->title_ar;
        $aboutUs->title_en = $request->title_en;

        $aboutUs->desc_ar = $request->desc_ar;
        $aboutUs->desc_en = $request->desc_en;
        $aboutUs->save();
        return redirect()->route('dashboard.aboutUs.index')->with('success', 'About us updated successfully');
    }
}
