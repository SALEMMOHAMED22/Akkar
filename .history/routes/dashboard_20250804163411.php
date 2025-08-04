<?php

use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Password\ResetPasswordController;
use App\Http\Controllers\Dashboard\SettingController;
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
        // Login Routes 
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');


        // Reset Password Routes
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {

            Route::controller(ResetPasswordController::class)->group(function () {

                Route::get('email', 'showEmailForm')->name('email');
                Route::post('email', 'sendOtp')->name('email.post');

                Route::get('verify/{email}', 'showOtpForm')->name('verify');
                Route::post('verify', 'verifyOtp')->name('verify.post');

                Route::get('reset/{email}', 'showResetForm')->name('reset');
                Route::post('reset', 'resetPassword')->name('reset.post');
            });
        });



        Route::group(['middleware' => 'auth:admin'], function () {
            // Home Route
            Route::get('/home', [HomeController::class, 'index'])->name('home');

            // Roles Routes
            Route::resource('roles', RolesController::class)->except(['show']);

            // Admins Routes
            Route::resource('admins' , AdminController::class)->except(['show']);
            Route::get('admins/{id}/status', [AdminController::class, 'changeStatus'])->name('admins.changeStatus');


            // Settings Routes
            Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
            Route::put('settings/{id}', [SettingController::class, 'update'])->name('settings.update');


            // FaQs Routes 
            Route::get('faqs')

        });
    }

);
