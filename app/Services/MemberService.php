<?php

namespace App\Services;

use App\DTO\Member\MemberCreateDTO;
use App\DTO\Member\MemberUpdateDTO;
use App\Http\Requests\MemberRequest;
use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Repositories\Interfaces\UsersRepositoryInterface;
use Exception;
use Illuminate\Pagination\Paginator;
use stdClass;

class MemberService
{

    public function __construct(
        protected MemberRepositoryInterface $repository,
        protected UsersRepositoryInterface $repositoryUser,
    ) {
    }

    public function index(int $amount): Paginator
    {
        return $this->repository->index($amount);
    }

    public function show(string $id): stdClass
    {
        return $this->repository->show($id);
    }

    public function store(MemberRequest $request): stdClass
    {
        $memberDTO = MemberCreateDTO::makeFromRequest($request);
        if ($user = $this->repositoryUser->find($request->user_id)) {
            return $this->repository->store($memberDTO, $user);
        }
        throw new Exception('User dont exists');
    }

    public function update(MemberRequest $request, string $id): void
    {
        $memberDTO = MemberUpdateDTO::makeFromRequest($request);
        $this->repository->update($memberDTO, $id);
    }

    public function destroy(string $id): void
    {
        $this->repository->destroy($id);
    }
}
