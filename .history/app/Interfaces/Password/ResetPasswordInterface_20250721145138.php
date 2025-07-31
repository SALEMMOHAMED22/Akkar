<?php

namespace App\Interfaces\Password;

interface ResetPasswordInterface
{
    public function sendOtp(string $email);
    public function verifyOtp(string $email , int $code);
    public function resetPassword(string $email , string $password);
}
