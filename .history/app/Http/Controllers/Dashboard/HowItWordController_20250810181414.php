<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HowItWorks;
use Illuminate\Http\Request;

class HowItWordController extends Controller
{
    public function howItWorks(){
        $howItWork = HowItWorks::first();
        return view('dashboard.how-it-works.index' , compact('howItWork'));
    }

    pub
}
