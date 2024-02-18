<?php

namespace App\Repositories\Interfaces;

use Illuminate\Pagination\Paginator;
use stdClass;

interface RolesRepositoryInterface
{
    public function index(int $amount): Paginator;
    public function show(string $id): stdClass;
    public function store(string $role): stdClass;
    public function update(string $role, string $id): void;
    public function destroy(string $id): void;
}
