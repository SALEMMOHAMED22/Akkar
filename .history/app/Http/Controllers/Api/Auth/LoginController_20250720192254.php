<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\Auth\AuthRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $authRepo;

    public function __construct(AuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    

    public function login(LoginRequest $request)
    {
            try {
                $user = $this->authRepo->login($request->validated());
                return apiResponse(200 , 'User logged in successfully'  , $user);
            } catch (\Exception $e) {
                return apiResponse(401 , $e->getMessage());
            }

    }

    public function logout(){
            
    }
}
