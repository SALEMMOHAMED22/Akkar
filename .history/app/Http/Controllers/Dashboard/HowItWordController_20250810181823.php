<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HowItWorks;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HowItWorkRequest;

class HowItWordController extends Controller
{
    public function howItWorks(){
        $howItWork = HowItWorks::first();
        return view('dashboard.how-it-works.index' , compact('howItWork'));
    }

    public function updateHowItWorks(HowItWorkRequest $request){
         $howItWork = HowItWorks::first();
 

         $data = $request->only(['title_ar', 'title_en', 'desc_ar', 'desc_en']);

        if ($request->hasFile('image')) {
            if ($howItWork->image) {
                ImageManger::deleteImage($howItWork->image);
            }

            $path = ImageManger::uploadImage('storage/general', $request->file('image'), 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $howItWork->image;
        }

        $howItWork->update($data);

        return redirect()->route('dashboard.howItWorks.index')->with('success', 'How it works  updated successfully');
    }
}
