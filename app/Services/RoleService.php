<?php

namespace App\Services;

use App\Repositories\Interfaces\RolesRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class RoleService
{
    public function __construct(
        protected RolesRepositoryInterface $repository,
    )
    {}

    public function index(int $amount): Paginator
    {
        return $this->repository->index($amount);
    }

    public function show(string $id): stdClass
    {
        return $this->repository->show($id);
    }

    public function store(string $role): stdClass
    {
        return $this->repository->store($role);
    }

    public function update(string $role, string $id): void
    {
        $this->repository->update($role, $id);
    }

    public function destroy(string $id): void
    {
        $this->repository->destroy($id);
    }
}
