<?php

namespace App\Repository\Eloquent;

use App\Models\Address;


use App\Models\Freight;
use App\Repository\AddressRepositoryInterface;



class AddressRepository implements AddressRepositoryInterface
{
    private Address $addressModel;

    public function __construct(Address $addressModel)
    {
        $this->addressModel = $addressModel;
    }

    public function create(array $data)
    {
        Address::create([
            'country' => $data['country'],
            'postcode' => $data['postcode'],
            'city' => $data['city']
        ]);
    }

    public function createAndGetId(array $data)
    {
        $address = Address::create([
            'country' => $data['country'],
            'postcode' => $data['postcode'],
            'city' => $data['city']
        ]);

        return $address->id;
    }
}
