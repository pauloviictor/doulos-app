<?php

namespace App\Services;

use App\DTO\Scale\CreateUpdateScaleDTO;
use App\Repositories\Interfaces\ScaleRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class ScaleService
{
    public function __construct(
        protected ScaleRepositoryInterface $repository,
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

    public function store(CreateUpdateScaleDTO $scale): stdClass
    {
        return $this->repository->store($scale);
    }

    public function update(CreateUpdateScaleDTO $scale, string $id): void
    {
        $this->repository->update($scale, $id);
    }

    public function destroy(string $id): void
    {
        $this->repository->destroy($id);
    }
}
