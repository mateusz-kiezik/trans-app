<?php

namespace App\Repository;


use App\Models\Cargo;
use App\Models\Freight;
use Illuminate\Support\Collection;

interface CargoRepositoryInterface
{
    public function create(array $data);

    public function createAndGetId(array $data);

    public function get(int $id): Cargo;
}
