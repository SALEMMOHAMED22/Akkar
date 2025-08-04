<?php

namespace App\Http\Controllers\Dashboard\Password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showEmailForm(){

        return view('dashboard.auth.password.email');
    }


    public function sendOtp(Request $request){

      $request->validate([
            'email' => 'required|email|exists:admins,email',
      ]);

      $admin = Admin::
    
        
    }
}
