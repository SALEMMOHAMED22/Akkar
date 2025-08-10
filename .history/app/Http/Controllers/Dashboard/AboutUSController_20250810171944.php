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

        $data = $request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en']); // الحقول النصية

        if ($request->hasFile('image')) {
            if ($aboutUs->image) {
                ImageManger::deleteImage($aboutUs->image);
            }

            // رفع الصورة الجديدة
            $path = ImageManger::uploadImage('storage/general', $request->file('image'), 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $aboutUs->image;
        }

        $aboutUs->update($data);

        return redirect()->route('dashboard.aboutUs.index')->with('success', 'About us updated successfully');
    }
}
