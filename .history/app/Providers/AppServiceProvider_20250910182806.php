<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use App\Repositories\FaqsRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Repositories\Ad\AdRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Auth\AuthRepository;
use App\Interfaces\FaqsRepositoryInterface;
use App\Interfaces\Ad\AdRepositoryInterface;
use App\Interfaces\Profile\ProfileInterface;
use App\Repositories\Plans\PlanRepositories;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\General\GeneralRepository;
use App\Repositories\Profile\ProfileRepository;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Interfaces\Plans\PlanRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Property\PropertyRepository;
use App\Repositories\Provider\ProviderRepository;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Interfaces\Password\ResetPasswordInterface;
use App\Interfaces\Contact\ContactRepositoryInterface;
use App\Interfaces\General\GeneralRepositoryInterface;
use App\Repositories\Password\ResetPasswordRepository;
use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Interfaces\Property\PropertyRepositoryInterface;
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
        $this->app->bind(GeneralRepositoryInterface::class , GeneralRepository::class);
        $this->app->bind(PlanRepositoryInterface::class , PlanRepositories::class);
        this->app->bind(PropertyRepositoryInterface::class , PropertyRepository::class);

        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

         foreach (config('permission_en') as $config_permission => $value) {
            Log::info("Defining gate for permission: {$config_permission}");
            Gate::define($config_permission, function ($auth) use ($config_permission) {
                return $auth->hasAccess($config_permission);
            });
        }
    }
}
