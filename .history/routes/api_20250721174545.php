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
Route::post('/verifyEmail', [RegisterController::class, 'verifyEmail']);
Route::post('/resendOtp', [RegisterController::class, 'resendOtp']);
Route::post('/login', [LoginController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LoginController::class, 'logout']);

    // Reset Passwor Routes 
    Route::post('password/otp', [ResetPasswordController::class, 'sendOtp']);
    Route::post('password/verify-otp', [ResetPasswordController::class, 'verifyOtp']);
    Route::post('password/reset', [ResetPasswordController::class, 'resetPassword']);
    // End Reset Password Routes


    // 
});
