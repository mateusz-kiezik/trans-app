<?php

namespace App\Repository;


use App\Models\Freight;
use Illuminate\Support\Collection;

interface FreightRepositoryInterface
{
    public function get(int $id): Freight;

    public function all(): Collection;

    public function create(array $data);

    public function createAndGetId(array $data): int;

    public function getFiveNewest(): Collection;

}
