<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function termsAndConditions()
    {
        
        return view('dashboard.terms-and-conditions.index');
    }
}
