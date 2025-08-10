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
       
    }
}
