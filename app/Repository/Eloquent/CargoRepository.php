<?php

namespace App\Repository\Eloquent;

use App\Models\Address;
use App\Models\Cargo;
use App\Models\Freight;
use App\Models\User;
use App\Repository\CargoRepositoryInterface;
use Illuminate\Support\Collection;


class CargoRepository implements CargoRepositoryInterface
{
    private Cargo $cargoModel;

    public function __construct(Cargo $cargoModel)
    {
        $this->cargoModel = $cargoModel;
    }

    public function create(array $data)
    {
        Cargo::create([
           'cargo_type_id' => $data['cargoType'],
            'qty' => $data['quantity'],
            'weight' => $data['weight'],
            'description' => $data['description']
        ]);
    }

    public function createAndGetId(array $data)
    {
        $cargo = Cargo::create([
            'cargo_type_id' => $data['cargoType'],
            'qty' => $data['quantity'],
            'weight' => $data['weight'],
            'description' => $data['description']
        ]);

        return $cargo->id;
    }

    public function get(int $id): Cargo
    {
        return Cargo::findOrFail($id);
    }
}
