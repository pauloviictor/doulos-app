<?php

namespace App\Repositories\Interfaces;

use App\DTO\Scale\CreateUpdateScaleDTO;
use Illuminate\Pagination\Paginator;
use stdClass;

interface ScaleRepositoryInterface
{
    public function index(int $amount): Paginator;
    public function show(string $idScale): stdClass;
    public function store(CreateUpdateScaleDTO $dto): stdClass;
    public function update(CreateUpdateScaleDTO $dto, string $id): void;
    public function destroy(string $idScale): void;
    public function getForMinistryInMonth(string $ministry): stdClass;
}
