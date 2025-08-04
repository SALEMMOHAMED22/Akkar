<?php

namespace App\Http\Controllers\Dashboard\Password;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SendOtpNotify;

class ResetPasswordController extends Controller
{
    public function showEmailForm(){

        return view('dashboard.auth.password.email');
    }


    public function sendOtp(Request $request){

      $request->validate([
            'email' => 'required|email|exists:admins,email',
      ]);

      $admin = Admin::where('email' , $request->email)->first();
      if(!$admin){
        return redirect()->back()->withErrors(['email' => 'This email is not registered']);
      }

      $admin->notify(new SendOtpNotify($admin->email));

      return redirect()->route('dashboard.password.verify' , ['email' => $request->email]);
    
        
    }

    public function showOtpForm($email){

        return view('dashboard.auth.password.verify' , compact('email'));
    }


    public function verifyOtp()


}
