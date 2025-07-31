<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RolesController;

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

route::get('/home', function () {
    return view('dashboard.index');
})->name('dashboard.home');





}

Route::resource('roles', RolesController::class);

