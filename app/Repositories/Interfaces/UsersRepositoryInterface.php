<?php

namespace App\Repositories\Interfaces;

use App\DTO\Users\AuthDTO;
use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use stdClass;

interface UsersRepositoryInterface
{
    public function login(AuthDTO $userDto): string;
    public function index(int $amount): Paginator;
    public function show(string $idUser): stdClass;
    public function store(CreateUserDTO $userDto): stdClass;
    public function update(UpdateUserDTO $userDto): void;
    public function destroy(string $idUser): void;
    public function find(string $idUser): User;
}
