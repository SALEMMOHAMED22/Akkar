<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HowItWorkRequest;
use App\Models\HowItWorks;
use Illuminate\Http\Request;

class HowItWordController extends Controller
{
    public function howItWorks(){
        $howItWork = HowItWorks::first();
        return view('dashboard.how-it-works.index' , compact('howItWork'));
    }

    public function updateHowItWorks(HowItWorkRequest){
         $privacy = PrivacyPolicy::first();
 

         $data = $request->only(['title_ar', 'title_en', 'content_ar', 'content_en']); // الحقول النصية

        if ($request->hasFile('image')) {
            if ($privacy->image) {
                ImageManger::deleteImage($privacy->image);
            }

            $path = ImageManger::uploadImage('storage/general', $request->file('image'), 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $privacy->image;
        }

        $privacy->update($data);

        return redirect()->route('dashboard.privacyPolicy.index')->with('success', 'Privacy policy updated successfully');
    }
}
