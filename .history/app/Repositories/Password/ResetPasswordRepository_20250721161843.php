<?php

namespace App\Repositories\Password;

use App\Models\User;
use App\Interfaces\Password\ResetPasswordInterface;

class ResetPasswordRepository implements ResetPasswordInterface
{
    public function sendOtp(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
           retu
        }
        $user->notify(new SendOtpNotify($user->email));
    }
}
