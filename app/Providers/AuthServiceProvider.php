<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Ministry;
use App\Models\User;
use App\Policies\MinistryPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Ministry::class => MinistryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update', [UserPolicy::class, 'update']);
        Gate::define('createMinistry', [MinistryPolicy::class, 'create']);
        Gate::define('updateMinistry', [MinistryPolicy::class, 'update']);
        Gate::define('deleteMinistry', [MinistryPolicy::class, 'delete']);
        Gate::define('attachMinistry', [MinistryPolicy::class, 'attach']);
    }
}
