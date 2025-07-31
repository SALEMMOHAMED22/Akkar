<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/auth/register' , [RegisterController::class , 'register']);

Route::post('/auth/login' , [LoginController::class , 'login']);
