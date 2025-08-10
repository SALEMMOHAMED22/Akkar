<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function termsAndConditions()
    {
        $terms = TermsAndCondition::first();
        return view('dashboard.terms-and-conditions.index');
    }
}
