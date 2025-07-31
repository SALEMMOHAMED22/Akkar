<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run-config-clear', function () {
    Artisan::call('config:clear');
    return '✅ config:clear تم بنجاح';
});


route::get('/index')