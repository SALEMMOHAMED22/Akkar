<?php

namespace App\Interfaces\Auth;

interface AuthRepositoryInterface
{
    public function register(array $data);
    pu
    public function login(array $credentials);
    public function logout();
}
