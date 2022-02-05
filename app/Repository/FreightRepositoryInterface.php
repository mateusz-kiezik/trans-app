<?php

namespace App\Repository;


use App\Models\Freight;
use Illuminate\Support\Collection;

interface FreightRepositoryInterface
{
    public function get(int $id): Freight;

    public function all();

    public function allActive();

    public function create(array $data);

    public function createAndGetId(array $data): int;

    public function getFiveNewest(): Collection;

    public function updateStatus(int $id, bool $status): void;

    public function sortBy($column, $direction);

}
