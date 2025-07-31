<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserVerifyResource;
use App\Interfaces\Auth\AuthRepositoryInterface;

class LoginController extends Controller
{
    protected $authRepo;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    

    public function login(LoginRequest $request)
    {
            try {
                $user = $this->authRepo->login($request->validated());
                if($user = "not active"){
                    return apiResponse(400 , 'User not activated');
                }
                return apiResponse(200 , 'User logged in successfully'  , [
                    'user' => new UserVerifyResource($user['user']),
                    'token' => $user['token'],
                ]);
            } catch (\Exception $e) {
                return apiResponse(401 , $e->getMessage());
            }

    }

    public function logout(Request $request) {
        
         $this->authRepo->logout();

         return apiResponse(200 , 'User logged out successfully');


    }
}
