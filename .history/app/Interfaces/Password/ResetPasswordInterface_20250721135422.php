<?php

namespace App\Interfaces\Password;

interface ResetPasswordInterface
{
    public function sendOtp(string $email);
    public function checkOtp
}
