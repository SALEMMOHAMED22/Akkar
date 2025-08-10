<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        return view('dashboard.privacy-policy.index');
    }


    public function updatePrivacyPolicy(Request $request)
    {
        $privacyPolicy = $this->generalRepo->updatePrivacyPolicy($request);
        return apiResponse(200, 'Privacy policy updated successfully', new PrivacyPolicyResource($privacyPolicy));
    }
}
