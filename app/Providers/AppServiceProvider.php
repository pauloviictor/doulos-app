<?php

namespace App\Providers;

use App\Repositories\Eloquent\MemberRepository;
use App\Repositories\Eloquent\MinistryRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\ScaleRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Repositories\Interfaces\MinistryRepositoryInterface;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use App\Repositories\Interfaces\ScaleRepositoryInterface;
use App\Repositories\Interfaces\UsersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UsersRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            RolesRepositoryInterface::class,
            RoleRepository::class
        );

        $this->app->bind(
            MemberRepositoryInterface::class,
            MemberRepository::class
        );

        $this->app->bind(
            ScaleRepositoryInterface::class,
            ScaleRepository::class
        );

        $this->app->bind(
            MinistryRepositoryInterface::class,
            MinistryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
