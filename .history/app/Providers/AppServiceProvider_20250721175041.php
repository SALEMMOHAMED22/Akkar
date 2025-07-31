<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Interfaces\Password\ResetPasswordInterface;
use App\Repositories\Password\ResetPasswordRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ResetPasswordInterface::class , ResetPasswordRepository::class);
        $this->app->bind();
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
