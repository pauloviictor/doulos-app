<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class RoleRepository implements RolesRepositoryInterface
{
    public function index(int $amount): Paginator
    {
        return Role::simplePaginate($amount);
    }

    public function show(string $id): stdClass
    {
        $role = Role::find($id);
        return (object) $role->toArray();
    }

    public function store(string $role): stdClass
    {
        $role = Role::create(['role' => $role]);
        return (object) $role->toArray();
    }

    public function update(string $role, string $id): void
    {
        Role::where('id', $id)
        ->update([
            'role' => $role
        ]);
    }

    public function destroy(string $id): void
    {
        Role::destroy($id);
    }
}
