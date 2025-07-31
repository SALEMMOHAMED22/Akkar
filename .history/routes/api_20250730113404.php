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
use App\Http\Controllers\Api\General\GeneralController;
use App\Http\Controllers\Api\Password\ResetPasswordController;
use App\Http\Controllers\Api\Provider\ProviderController;
use App\Http\Controllers\ContactController;

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


// Get 
 

// Categories Route 
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/sub-categories', [CategoryController::class, 'getSubCategories']);
Route::get('/category/{id}', [CategoryController::class, 'getCategoryById']);
Route::get('/categories/sub-categories', [CategoryController::class, 'getCatsWithSubCats']);
Route::get('/subCategries/{catId}', [CategoryController::class, 'getSubCategoriesByCatId']);
// End Categories Route

// Ads Routes
Route::get('/ads', [AdController::class, 'getAll']);
Route::get('/ads/by-category/{catId}', [AdController::class, 'getAdsByCatId']);
Route::get('/ads/by-sub-category/{subCatId}', [AdController::class, 'getAdsBySubCatId']);
Route::get('/ads/by-sub-sub-category/{subSubCatId}', [AdController::class, 'getAdsBySubSubCatId']);

Route::post('/ads/search', [AdController::class, 'searchAds']);


Route::get('/ad/{adId}', [AdController::class, 'getAdById']);

Route::get('/ads/{adId}/related', [AdController::class, 'getRelatedAds']);

Route::get('/ad/{adId}/reviews', [AdController::class, 'getAdReviews']);
Route::post('/ad/review', [AdController::class, 'storeReview']);

Route::post('/ad/filter', [AdController::class, 'filterAds']);



// End Ads Routes


  // show provider profile by Id 
    Route::get('/provider/profile/{providerId}', [ProviderController::class, 'getProviderProfileByProvId']);
    Route::get('/provider/ads/{providerId}', [ProviderController::class, 'getProviderAdsByProvId']);
    Route::get('/provider/ads/reviews/{providerId}', [ProviderController::class, 'getProviderAdsReviewsByProvId']);
    Route::get('/provider/statistics/{providerId}', [ProviderController::class, 'getProviderStatisticsByProvId']);

// Contact Route 
Route::post('/contact', [ContactController::class, 'contactStore']);

// FAQs Route
Route::get('/faqs', [FaqsController::class, 'getFaqs']);
// About Us Route
Route::get('/about-us', [GeneralController::class, 'aboutUs']);
Route::get('/how-it-works', [GeneralController::class, 'howItWorks']);
Route::get('/privacy-policy', [GeneralController::class, 'privacyPolicy']);
Route::get('/terms-and-conditions', [GeneralController::class, 'termsAndConditions']);

Route::get('/settings', [GeneralController::class, 'settings']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LoginController::class, 'logout']);

    // Profile Route 
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate']);
    Route::post('/profile/email/notify', [ProfileController::class, 'emailNotification']);
    Route::post('/profile/identifies/store', [ProfileController::class, 'identifiesStore']);
    Route::post('/profile/identifies/update', [ProfileController::class, 'identifiesUpdate']);

    // Provider Routes
    // show provider profile
    Route::get('/provider/profile', [ProviderController::class, 'getProviderProfile']);
    Route::get('/provider/ads', [ProviderController::class, 'getProviderAds']);
    Route::get('/provider/ads/reviews', [ProviderController::class, 'getProviderAdsReviews']);
    Route::get('/provider/statistics', [ProviderController::class, 'getProviderStatistics']);


  

    // End Provider Routes

    // Ad Routes
    Route::post('/ad/store', [AdController::class, 'storeAd']);
    // End Ad Routes




});
