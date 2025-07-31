<?php

namespace App\Providers;

use App\Repositories\FaqsRepository;
use App\Repositories\Ad\AdRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Interfaces\FaqsRepositoryInterface;
use App\Interfaces\Ad\AdRepositoryInterface;
use App\Interfaces\Profile\ProfileInterface;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Profile\ProfileRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Provider\ProviderRepository;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Interfaces\Password\ResetPasswordInterface;
use App\Interfaces\Contact\ContactRepositoryInterface;
use App\Repositories\Password\ResetPasswordRepository;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Provider\ProviderRepositoryInterface;

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
        $this->app->bind(FaqsRepositoryInterface::class , FaqsRepository::class);
        $this->app->bind(AdRepositoryInterface::class , AdRepository::class);
        $this->app->bind(ProviderRepositoryInterface::class , ProviderRepository::class);
        $this->app->bind(ContactRepositoryInterface::class , ContactRepository::class);
        
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
