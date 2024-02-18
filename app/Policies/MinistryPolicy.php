<?php

namespace App\Policies;

use App\Models\Ministry;
use App\Models\User;
use App\Services\MinistryService;
use App\Services\Users\UserService;
use Illuminate\Auth\Access\Response;

class MinistryPolicy
{

    public function __construct(
        protected MinistryService $service,
        )
    {

    }

    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, Ministry $ministry): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, string $ministryName): bool
    {
        return $user->id === 1 || $this->service->isLeader($user->id, $ministryName);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, string $ministryName): bool
    {
        return $user->isAdmin() || $this->service->isLeader($user->id, $ministryName);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, string $ministryName): bool
    {
        return $user->isAdmin() || $this->service->isLeader($user->id, $ministryName);
    }

    public function attach(User $user, string $ministryName): bool
    {
        dd();
        return $user->isAdmin() || $this->service->isLeader($user->id, $ministryName);
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Ministry $ministry): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Ministry $ministry): bool
    // {
    //     //
    // }
}
