<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FaqsController;
use App\Http\Controllers\Api\Ad\AdController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\Categories\CategoryController;
use App\Http\Controllers\Api\Password\ResetPasswordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Authentication Routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/verifyEmail', [RegisterController::class, 'verifyEmail']);
Route::post('/resendOtp', [RegisterController::class, 'resendOtp']);
Route::post('/login', [LoginController::class, 'login']);
 // Reset Passwor Routes 
    Route::post('password/otp', [ResetPasswordController::class, 'sendOtp']);
    Route::post('password/verify-otp', [ResetPasswordController::class, 'verifyOtp']);
    Route::post('password/reset', [ResetPasswordController::class, 'resetPassword']);
 // End Reset Password Routes

 
    // Categories Route 
    Route::get('/categories', [CategoryController::class, 'getCategories']);
    Route::get('/sub-categories', [CategoryController::class, 'getSubCategories']);
    Route::get('/category/{id}', [CategoryController::class, 'getCategoryById']);
    Route::get('/categories/sub-categories', [CategoryController::class, 'getCatsWithSubCats']);
    Route::get('/subCategries/{catId}', [CategoryController::class, 'getSubCategoriesByCatId']);
    // End Categories Route

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LoginController::class, 'logout']);
    // Profile Route 
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate']);
    Route::post('/profile/email/notify', [ProfileController::class, 'emailNotification']);
    Route::post('/profile/identifies/store', [ProfileController::class, 'identifiesStore']);
    Route::post('/profile/identifies/update', [ProfileController::class, 'identifiesUpdate']);




    // Ad Routes
    Route::get('/ads' , [AdController::class, 'getAll']);
    Route::post('/ad/store', [AdController::class, 'storeAd']);
    Route::get('/ad/{adId}', [AdController::class, 'getAdById']);

    Route::get('/ads/{adId')

    Route::get('/ad/{adId}/reviews', [AdController::class, 'getAdReviews']);
    Route::post('/ad/{adId}/review', [AdController::class, 'storeReview']);

    Route::post('/ad/filter', [AdController::class, 'filterAds']);
    // End Ad Routes
    



    Route::get('/faqs', [FaqsController::class, 'getFaqs']);
});

