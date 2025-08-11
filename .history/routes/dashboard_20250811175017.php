<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Dashboard\AdController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HowItWordController;
use App\Http\Controllers\Dashboard\PrivacyPolicyController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\TermsConditionsController;
use App\Http\Controllers\Dashboard\Password\ResetPasswordController;

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

          Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
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
            Route::resource('faqs' , FaqController::class)->except(['show']);

            Route::get('users/individual/show' , [UserController::class , 'showUserIndividual'])->name('users.show.individual');
            Route::get('users/comany/show' , [UserController::class , 'showUserCompany'])->name('users.show.company');
            Route::get('users/individual' , [UserController::class , 'usersIndividual'])->name('users.individual');
            Route::get('users/company' , [UserController::class , 'usersCompany'])->name('users.company');
            Route::post('users/status', [UserController::class, 'changeStatus'])->name('users.status');


            // Contacts Routes 
            Route::get('contacts' , [ContactController::class , 'index'])->name('contacts.index');
            Route::post('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


            Route::get('/categories' , [CategoryController::class , 'index'])->name('categories.index');


            // About Us Routes 
            Route::get('about-us' , [AboutUsController::class , 'aboutUs'])->name('aboutUs.index');
            Route::post('about-us/update' , [AboutUsController::class , 'updateAboutUs'])->name('aboutUs.update');



        // Privacy policy Routes
        Route::get('privacy-policy' , [PrivacyPolicyController::class , 'privacyPolicy'])->name('privacyPolicy.index');
        Route::post('privacy-policy/update' , [PrivacyPolicyController::class , 'updatePrivacyPolicy'])->name('privacyPolicy.update');

        // Terms and conditions Routes
        Route::get('terms-and-conditions' , [TermsConditionsController::class , 'termsAndConditions'])->name('termsAndConditions.index');
        Route::post('terms-and-conditions/update' , [TermsConditionsController::class , 'updateTermsAndConditions'])->name('termsAndConditions.update');


        //  How It Works Routes
        Route::get('how-it-works' , [HowItWordController::class , 'howItWorks'])->name('howItWorks.index');
        Route::post('how-it-works/update' , [HowItWordController::class , 'updateHowItWorks'])->name('howItWorks.update');



        Route::get('/ads' , [AdController::class , 'index'])->name('ads.index');
        Route::get('/ad/show/{id}' , [AdController::class, 'showAd'])->name('ads.show');
        Route::put('/ads/{id}/status', [AdController::class, 'updateStatus'])->name('ads.updateStatus');
        Route::get('/ads/create' , [AdController::class , 'createAd'])->name('ads.create');

        });
    }

);
