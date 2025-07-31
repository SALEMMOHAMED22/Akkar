<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    public function register(array $data);
    ppublic
    public function login(array $credentials);
    public function logout();
}
