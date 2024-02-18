<?php

namespace App\Repositories\Eloquent;

use App\DTO\Scale\CreateUpdateScaleDTO;
use App\Models\Scale;
use App\Repositories\Interfaces\ScaleRepositoryInterface;
use Illuminate\Pagination\Paginator;
use stdClass;

class ScaleRepository implements ScaleRepositoryInterface
{
    public function index(int $amount): Paginator
    {
        return Scale::simplePaginate($amount);
    }

    public function show(string $id): stdClass
    {
        $scale = Scale::find($id);
        return (object) $scale->toArray();
    }

    public function store(CreateUpdateScaleDTO $dto): stdClass
    {
        $scale = Scale::create((array) $dto);
        return (object) $scale->toArray();
    }

    public function update(CreateUpdateScaleDTO $dto, string $id): void
    {
        Scale::where('id', $id)
        ->update((array) $dto);
    }

    public function destroy(string $id): void
    {
        Scale::destroy($id);
    }

    public function getForMinistryInMonth(string $ministry_id): stdClass
    {
        return Scale::where('ministry_id', $ministry_id)
        ->whereMonth('date', date('m'))
        ->get();
    }
}
