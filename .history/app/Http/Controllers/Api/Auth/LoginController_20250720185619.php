<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $userRepo;

    public function __construct(Auth $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    

    public function login(LoginRequest $request)
    {
        

    }
}
