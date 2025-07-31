<?php

namespace App\Providers;

// use App\Interfaces\ProfileInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Profile\ProfileRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use Symfony\Component\HttpKernel\Profiler\Profile;
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
        this
        
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
