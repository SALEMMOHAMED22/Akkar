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
        
        
    }
}
