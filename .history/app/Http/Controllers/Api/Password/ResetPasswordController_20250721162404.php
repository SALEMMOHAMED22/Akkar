<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
     protected $reset;

    public function __construct(AuthRepositoryInterface $reset)
    {
        $this->reset = $reset;
    }


}
