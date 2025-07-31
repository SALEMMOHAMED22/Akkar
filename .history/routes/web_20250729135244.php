<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-config-clear', function () {
    Artisan::call('config:clear');
    return '✅ config:clear تم بنجاح';
});