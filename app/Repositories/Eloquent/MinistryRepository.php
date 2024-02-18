<?php

namespace App\Repositories\Eloquent;

use App\DTO\Ministry\CreateUpdateMinistryDTO;
use App\Models\Ministry;
use App\Repositories\Interfaces\MinistryRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class MinistryRepository implements MinistryRepositoryInterface
{
    public function index(int $amount): Paginator
    {
        return Ministry::simplePaginate($amount);
    }

    public function show(string $id): stdClass
    {
        $ministry = Ministry::find($id);
        return (object) $ministry->toArray();
    }

    public function store(CreateUpdateMinistryDTO $dto): stdClass
    {
        $ministry = Ministry::create((array) $dto);
        $ministry->users()->attach($dto->leader_id);
        return (object) $ministry->toArray();
    }

    public function update(CreateUpdateMinistryDTO $dto, string $id): void
    {
        Ministry::where('id', $id)
            ->update((array) $dto);
    }

    public function destroy(string $id): void
    {
        Ministry::destroy($id);
    }

    public function isLeader(string $userId, string $ministryName): bool
    {
        $ministry = Ministry::where('leader_id', $userId)
        ->where('name', $ministryName)
        ->first();
        return $ministry ? $ministry->leader_id == $userId : false;
    }

    public function attachNewMember(string $newMemberUserId, Ministry $ministry): void
    {
        $users = $ministry->users()->get()->pluck('id');
        if(!$users->contains($newMemberUserId)){
            $ministry->users()->attach($newMemberUserId);
        }

    }
}
