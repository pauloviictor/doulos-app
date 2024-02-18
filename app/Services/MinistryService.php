<?php

namespace App\Services;

use App\DTO\Ministry\CreateUpdateMinistryDTO;
use App\Models\Ministry;
use App\Repositories\Interfaces\MinistryRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class MinistryService
{
    public function __construct(
        protected MinistryRepositoryInterface $repository,
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

    public function store(CreateUpdateMinistryDTO $dto): stdClass
    {
        return $this->repository->store($dto);
    }

    public function update(CreateUpdateMinistryDTO $dto, string $id): void
    {
        $this->repository->update($dto, $id);
    }

    public function destroy(string $id): void
    {
        $this->repository->destroy($id);
    }

    public function isLeader(string $userId, string $ministryName): bool{
        return $this->repository->isLeader($userId, $ministryName);
    }

    public function attachNewmember(string $newMemberUserId, Ministry $ministry){
        $this->repository->attachNewMember($newMemberUserId, $ministry);
    }
}
