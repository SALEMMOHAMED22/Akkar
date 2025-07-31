<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
     protected $resetPassRepo;

    public function __construct(AuthRepositoryInterface $resetPassRepo)
    {
        $this->resetPassRepo = $resetPassRepo;
    }


}
