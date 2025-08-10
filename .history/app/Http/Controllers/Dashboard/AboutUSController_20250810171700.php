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
        }else{
            $request->image = $aboutUs->image;
        }
        


        $aboutUs->update($request->all());
        return redirect()->route('dashboard.aboutUs.index')->with('success', 'About us updated successfully');
    }
}
