<?php

namespace App\Repositories\Eloquent;

use App\DTO\Member\MemberCreateDTO;
use App\DTO\Member\MemberUpdateDTO;
use App\Models\Member;
use App\Models\User;
use App\Repositories\Interfaces\MemberRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class MemberRepository implements MemberRepositoryInterface
{
    public function index(int $amount): Paginator
    {
        $members = Member::select('members.*', 'users.name as user_name', 'users.email as user_email')
            ->join('users', 'members.user_id', 'users.id')
            ->simplePaginate($amount);

        return $members;
    }

    public function show(string $id): stdClass
    {
        $member = Member::select(
            'members.*',
            'users.name as user_name',
            'users.email as user_email'
        )
            ->where('id', $id)
            ->join('users', 'users.id', 'members.user_id')
            ->first();

        return (object) $member->toArray();
    }

    public function store(MemberCreateDTO $memberDTO, User $user): stdClass
    {
        $member = new Member((array) $memberDTO);
        $user->member()->save($member);
        return (object) $member->toArray();
    }

    public function update(MemberUpdateDTO $memberDTO, string $id): void
    {
        Member::where('id', $id)
            ->update((array) $memberDTO);
    }

    public function destroy(string $id): void
    {
        Member::destroy($id);
    }
}
