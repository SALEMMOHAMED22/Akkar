<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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
        $this->authRepo->register($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'User registered successfully',
        ]);
    }
}
