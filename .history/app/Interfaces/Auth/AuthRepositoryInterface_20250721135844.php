<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function verifyEmail($email , $code);
    public function res
    public function login(array $credentials);
    public function logout();
}
