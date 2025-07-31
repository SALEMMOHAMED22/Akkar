<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\VerifyRequest;
use App\Interfaces\Auth\AuthRepositoryInterface;

class RegisterController extends Controller
{
    protected $authRepo;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }


    public function register(UserRequest $request)
    {
      
        $user = $this->authRepo->register($request->validated());
        if(! $user) {
            return apiResponse(400, 'User registration failed');
        }

        return apiResponse(200, 'User registered successfully' , ['email' => $user->email] );   
    }

    public function verifyEmail(VerifyRequest $request){

        $this->authRepo->verifyEmail($request->email , $request->code);
        return apiResponse(200 , 'Email verified successfully'  , [
            'user' => $user ,
            
        ] );
    }
}
