<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicy()
    {
        $privacy = PrivacyPolicy::first();
        return view('dashboard.privacy-policy.index' , compact('privacy'));
    }


    public function updatePrivacyPolicy(Request $request)
    {
        
        $privacy = PrivacyPolicy::first();

        $privacy->content_ar = $request->content_ar;
        $privacy->content_en = $request->content_en;
        $privacy->save();

        return redirect()->route('dashboard.privacyPolicy.index')->with('success', 'Privacy policy updated successfully');
    }
}
