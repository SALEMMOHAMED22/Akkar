<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $userRepo;

    public function __construct(AuthRepository $authRepo)
    {
        $this->userRepo = $authRepo;
    }
    

    public function login(LoginRequest $request)
    {
        

    }
}
