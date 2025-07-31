<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/auth/register' , [RegisterController::class , 'register']);

Route::post('/auth/login' , [LoginController::class , 'login']);

Route::middleware('sanctum')->group(function () {
    Route::post('/auth/logout' , [LoginController::class , 'logout']);
});

