<?php

namespace App\Http\Controllers\Dashboard;

use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Models\TermsAndCondition;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TermsConditionsRequest;

class TermsConditionsController extends Controller
{
    public function termsAndConditions()
    {
        $terms = TermsAndCondition::first();
        return view('dashboard.terms-conditions.index' , compact('terms'));
    }



    public function updateTermsAndConditions(TermsConditionsRequest $request)
    {
        $terms = TermsAndCondition::first();

          $data = $request->only(['title_ar', 'title_en', 'content_ar', 'content_en']); 

        if ($request->hasFile('image')) {
            if ($terms->image) {
                ImageManger::deleteImage($aboutUs->image);
            }

            $path = ImageManger::uploadImage('storage/general', $request->file('image'), 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $aboutUs->image;
        }

        $aboutUs->update($data);
        return redirect()->route('dashboard.termsAndConditions.index')->with('success', 'Terms and conditions updated successfully');
    }
}
