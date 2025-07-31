<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
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

        
    }


}
