<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicy()
    {
        $priva
        return view('dashboard.privacy-policy.index');
    }


    public function updatePrivacyPolicy(Request $request)
    {
        return $request; 
    }
}
