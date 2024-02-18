<?php

namespace App\Repositories\Interfaces;

use App\DTO\Ministry\CreateUpdateMinistryDTO;
use App\Models\Ministry;
use Illuminate\Pagination\Paginator;
use stdClass;

interface MinistryRepositoryInterface
{
    public function index(int $amount): Paginator;
    public function show(string $idMinistry): stdClass;
    public function store(CreateUpdateMinistryDTO $dto): stdClass;
    public function update(CreateUpdateMinistryDTO $dto, string $id): void;
    public function destroy(string $idMinistry): void;
    public function isLeader(string $userId, string $ministryName): bool;
    public function attachNewMember(string $newMemberUserId, Ministry $ministry): void;
}
