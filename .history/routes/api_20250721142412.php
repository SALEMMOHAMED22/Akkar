<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Password\ResetPasswordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication Routes
Route::post('/register', [RegisterController::class, 'register']);
//  to verify email
Route::post('/verifyEmail', [RegisterController::class, 'verifyEmail']);
Route::post('/resendOtp', [RegisterController::class, 'resendOtp']);
Route::post('/login', [LoginController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [LoginController::class, 'logout']);


    Route::post('password/email', [ResetPasswordController::class, 'sendOtp']);
});
