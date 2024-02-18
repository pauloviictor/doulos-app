<?php

namespace App\Services\Users;

use App\DTO\Users\AuthDTO;
use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UsersRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class UserService
{
    function __construct(
        protected UsersRepositoryInterface $repository
    ) {
    }

    public function index(int $amount): Paginator
    {
        return $this->repository->index($amount);
    }

    public function show(string $idUser): stdClass
    {
        return $this->repository->show($idUser);
    }

    public function store(RegisterRequest $request): stdClass
    {
        $userDto = CreateUserDTO::makeFromRequest($request);
        return $this->repository->store($userDto);
    }

    public function update(RegisterRequest $request, $id): void
    {
        $userDto = UpdateUserDTO::makeFromRequest($request, $id);
        $this->repository->update($userDto);
    }

    public function login(AuthRequest $request): string
    {
        $userDTO = AuthDTO::makeFromRequest($request);
        return $this->repository->login($userDTO);
    }

    public function destroy(string $idUser): void
    {
        $this->repository->destroy($idUser);
    }
}
