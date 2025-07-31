<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        then: function(){
            Route::middleware('web')
            ->group(base_path('routes/dashboard.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(SetLocale::class);

        $middleware->redirectGuestsTo(function(){
            if(request()->is('*/dashboard/*')){
                return route('dashboard.login');
            }else{
                return route('login');
            }
        });

        $middleware->redirectUsersTo(function(){
            if(Auth::guard('admin')->check()){
                return route('dashboard.home');
            }else{
                return route('home');
            }
        });

        



    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
