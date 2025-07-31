<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function verifyEmail($email , $code);
    public function resendOtp(string $email);
    public function login(array $credentials);
    public function logout();
}
