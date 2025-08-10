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
        return view('dashboard.terms-conditions.index' , compact('terms'));
    }



    public function updateTermsAndConditions(Request $request)
    {
        $terms = TermsAndCondition::first();

        $terms->update($request->all());
        return redirect()->route('dashboard.terms-conditions.index')->with('success', 'Terms and conditions updated successfully');
    }
}
