<?php

namespace App\Repositories\Interfaces;

use App\DTO\Member\MemberCreateDTO;
use App\DTO\Member\MemberUpdateDTO;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use stdClass;

interface MemberRepositoryInterface
{
    public function index(int $amount): Paginator;
    public function show(string $id): stdClass;
    public function store(MemberCreateDTO $memberDTO, User $user): stdClass;
    public function update(MemberUpdateDTO $memberDTO, string $id): void;
    public function destroy(string $id): void;
}
