<?php

namespace App\Repositories\Password;

use App\Models\Otp;
use App\Models\User;
use App\Notifications\SendOtpNotify;
use App\Interfaces\Password\ResetPasswordInterface;

class ResetPasswordRepository implements ResetPasswordInterface
{
    public function sendOtp(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
           return false;
        }
        $user->notify(new SendOtpNotify($user->email));
        return $user;
    }



    public function verifyOtp($email, $code){

          $user = User::where('email', $email)->first();

        if (!$user) {
            return null; 
        }

        $otp = Otp::where('identifier', $email)
            ->where('code', $code)
            ->where('valid', 1)
            ->first();

        if (!$otp) {
            return false; 
        }
 
        $user->email_verified_at = now();
        $user->save();
        
        $otp->delete(); 

        return $user;
    }

    public function 



}
