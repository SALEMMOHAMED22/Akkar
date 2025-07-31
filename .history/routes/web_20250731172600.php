<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RolesController;

Route::get('/', function () {
    return view('welcome');
});

