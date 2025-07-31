<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\VerifyRequest;
use App\Interfaces\Password\ResetPasswordInterface;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
     protected $resetPassRepo;

    public function __construct(ResetPasswordInterface $resetPassRepo)
    {
        $this->resetPassRepo = $resetPassRepo;
    }


    public function sendOtp(EmailRequest $request){

        $user = $this->resetPassRepo->sendOtp($request->email);
        if (!$user) {
            return apiResponse(400, 'User not found');
        }else{
            return apiResponse(200 , 'OTP sent successfully , please check your email ' , ['email' => $user->email]);
        }
    }

    public function verifyOtp(VerifyRequest $request){

        $user = $this->resetPassRepo->verifyOtp($request->email, $request->code);
        if (!$user) {
            return apiResponse(400, 'User not found');
        }else{
            return apiResponse(200 , 'OTP verified successfully' , ['email' => $user->email]);
        }
    }


    public function 


}
