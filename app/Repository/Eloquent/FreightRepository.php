<?php

namespace App\Repository\Eloquent;

use App\Models\Address;
use App\Models\Freight;
use App\Models\User;
use App\Repository\FreightRepositoryInterface;
use Illuminate\Support\Collection;


class FreightRepository implements FreightRepositoryInterface
{
    private Freight $freightModel;
    private User $userModel;
    private Address $addressModel;


    public function __construct(Freight $freightModel, User $userModel, Address $addressModel)
    {
        $this->freightModel = $freightModel;
        $this->userModel = $userModel;
        $this->addressModel = $addressModel;
    }

    public function get(int $id): Freight
    {
        return $this->freightModel->find($id);
    }

    public function all()
    {
        return $this->freightModel->paginate(10);
    }

    public function allActive()
    {
        return $this->freightModel->where('status_id', 1)->paginate(10);
    }

    public function create(array $data)
    {
        Freight::create([
            'start_address_id' => $data['start_address_id'],
            'end_address_id' => $data['end_address_id'],
            'start_date' => $data['start_date'],
            'start_time_from' => $data['start_time_from'],
            'end_date' => $data['end_date'],
            'end_time_from' => $data['end_time_from'],
            'truck_type_id' => $data['truck_type_id'],
            'truck_id' => $data['truck_id'],
            'cargo_id' => $data['cargo_id'],
            'freight_type_id' => $data['freight_type_id'],
            'forwarder_id' => $data['forwarder_id'],
            'status_id' => '1'
        ]);
    }

    public function createAndGetId(array $data): int
    {
        $array = (array)null;
        foreach ($data['truck_id'] as $key => $value) {
            if ($value == 1) {
                $array[] = ['id' => 1, 'name' => 'Standard'];
            }

            if ($value == 2) {
                $array[] = ['id' => 2, 'name' => 'Curtain'];
            }

            if ($value == 3) {
                $array[] = ['id' => 3, 'name' => 'Box'];
            }

            if ($value == 4) {
                $array[] = ['id' => 4, 'name' => 'Refrigerator'];
            }

            if ($value == 5) {
                $array[] = ['id' => 5, 'name' => 'Mega'];
            }

            if ($value == 6) {
                $array[] = ['id' => 6, 'name' => 'Container'];
            }
        }
        $json = json_encode($array);

        $freight = Freight::create([
            'start_address_id' => $data['start_address_id'],
            'end_address_id' => $data['end_address_id'],
            'start_date' => $data['start_date'],
            'start_time_from' => $data['start_time_from'],
            'end_date' => $data['end_date'],
            'end_time_from' => $data['end_time_from'],
            'truck_type_id' => $data['truck_type_id'],
            'truck_id' => $json,
            'cargo_id' => $data['cargo_id'],
            'freight_type_id' => $data['freight_type_id'],
            'forwarder_id' => $data['forwarder_id'],
            'status_id' => '1'
        ]);

        return $freight->id;
    }

    public function getFiveNewest(): Collection
    {
        $freights = $this->freightModel->latest()->take(5)->get();

        return $freights;
    }

    public function updateStatus(int $id, bool $status): void
    {
        $freight = $this->freightModel->find($id);
        $freight->status_id = $status;
        $freight->save();
    }

    public function sortBy($column, $direction)
    {
        $freights = $this->freightModel->sort($column, $direction)->paginate(10);

        return $freights;
    }

    public function find($parameters)
    {

        $freights = $this->freightModel->finder($parameters)->orderBy('start_date')->get();

        return $freights;
    }
}
