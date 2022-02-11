<?php

namespace App\Repository;


use App\Models\Freight;
use Illuminate\Support\Collection;

interface AddressRepositoryInterface
{
    public function create(array $data);

    public function createAndGetId(array $data);

    public function all();


}
