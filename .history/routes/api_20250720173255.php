<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register/email' , [RegisterController::class , 'registerWithEmail'] );
Route::post('/register/details' , [RegisterController::class , 'CompleteRe'] );

