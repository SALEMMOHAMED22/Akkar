<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Dashboard\AuthController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', function () {
    return view('welcome');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        
        Route::post('login', [AuthController::class, 'login'])->name('login.post');

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    

        Route::get('/home' , [Home])




        Route::resource('roles', RolesController::class);
    }

);
