<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Interfaces\Profile\ProfileInterface;
use App\Repositories\Profile\ProfileRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Interfaces\Password\ResetPasswordInterface;
use App\Repositories\Password\ResetPasswordRepository;
use App\Interfaces\Category\CategoryRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ResetPasswordInterface::class , ResetPasswordRepository::class);
        $this->app->bind(ProfileInterface::class , ProfileRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class , CategoryRepository::class);
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
