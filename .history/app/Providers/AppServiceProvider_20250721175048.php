<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Interfaces\Password\ResetPasswordInterface;
use App\Repositories\Password\ResetPasswordRepository;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ResetPasswordInterface::class , ResetPasswordRepository::class);
        $this->app->bind(Profilee);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
