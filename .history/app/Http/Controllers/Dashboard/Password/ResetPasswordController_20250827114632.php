<?php

namespace App\Http\Controllers\Dashboard\Password;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Notifications\SendOtpNotify;

class ResetPasswordController extends Controller
{
    public function showEmailForm()
    {

        return view('dashboard.auth.password.email');
    }


    public function sendOtp(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'This email is not registered']);
        }
         $otp = sendOtp($admin->email);

        $user->notify(new SendOtpNotify($otp));

        $admin->notify(new SendOtpNotify($admin->email));

        return redirect()->route('dashboard.password.verify', ['email' => $admin->email]);
    }

    public function showOtpForm($email)
    {

        return view('dashboard.auth.password.verify', ['email' => $email]);
    }


    public function verifyOtp(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'code' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'This email is not registered']);
        }
        $otp = Otp::where('identifier', $request->email)
            ->where('code', $request->code)
            ->where('valid', 1)
            ->first();

        if (!$otp) {
            return redirect()->back()->withErrors(['error' => 'Invalid OTP']);
        }

        $otp->delete();

        return redirect()->route('dashboard.password.reset', ['email' => $admin->email]);
    }

    public function showResetForm($email)
    {
        return view('dashboard.auth.password.reset', ['email' => $email]);
    }

    public function resetPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'This email is not registered']);
        }

        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('dashboard.login')->with('success', 'Password reset successfully');
    }
}
