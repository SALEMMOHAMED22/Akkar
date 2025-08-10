<?php

namespace App\Http\Controllers\Dashboard;

use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PrivacyPolicyRequest;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicy()
    {
        $privacy = PrivacyPolicy::first();
        return view('dashboard.privacy-policy.index' , compact('privacy'));
    }


    public function updatePrivacyPolicy(PrivacyPolicyRequest $request)
    {
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
