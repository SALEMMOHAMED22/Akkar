<?php

namespace App\Http\Controllers\Dashboard\Password;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Otp;
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

      return redirect()->route('dashboard.password.verify' , ['email' => $admin->email]);
    
        
    }

    public function showOtpForm($email){

        return view('dashboard.auth.password.verify' ,['email' => $email]);
    }


    public function verifyOtp(Request $request){
       
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'otp' => 'required',
        ]);

        $admin = Admin::where('email' , $request->email)->first();

        if(!$admin){
            return redirect()->back()->withErrors(['email' => 'This email is not registered']);
        }
        $otp = Otp::where('identifier' , $request->email)
        ->where('code' , $request->code)
        ->where('valid' , 1)
        ->first();

        if(!$otp){
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
        }

        $admin->email_verified_at = now();
        $admin->save();
        $otp->delete();

        return redirect()->route('dashboard.password.reset' , ['email' => $admin->email]);


    }

    public function showResetForm($email){
        return view('dashboard.auth.password.reset' , ['email' => $email]);
    }

    pub


}
