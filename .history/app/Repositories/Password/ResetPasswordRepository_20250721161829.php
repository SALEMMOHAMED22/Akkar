<?php

namespace App\Repositories\Password;

use App\Interfaces\Password\ResetPasswordInterface;

class ResetPasswordRepository implements ResetPasswordInterface
{
    public function sendOtp(string $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            throw new \Exception('User not found');
        }
        $user->notify(new SendOtpNotify($user->email));
    }
}
