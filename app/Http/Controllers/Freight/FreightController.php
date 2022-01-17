<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Freight;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FreightController extends Controller
{
    public function show(): View
    {
        $dataTruckTypes = DB::table('truck_types');
        $dataTrucks = DB::table('trucks');
        $dataCargoTypes = DB::table('cargo_types');
        $dataCargos = DB::table('cargos');
        $dataAddresses = DB::table('addresses');
        $dataFreights = DB::table('freights');
        $dataUsers = DB::table('users');
        $dataFreightTypes = DB::table('freight_types');

        //Truck types INSERT
        $dataTruckTypes->insertOrIgnore(['id' => 1, 'name' => 'Bus']);
        $dataTruckTypes->insertOrIgnore(['id' => 2, 'name' => 'Solo']);
        $dataTruckTypes->insertOrIgnore(['id' => 3, 'name' => "Semi-trailer"]);

        //Trucks INSERT
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Standard']);
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Curtain']);
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Box']);
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Refrigerator']);
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1, 'name' => 'Mega']);
        $dataTrucks->insertOrIgnore(['truck_type_id' => 1, 'name' => 'Container semi-trailer']);

        //Cargo types INSERT
        $dataCargoTypes->insertOrIgnore(['id' => 1, 'name' => 'Pallet']);
        $dataCargoTypes->insertOrIgnore(['id' => 2, 'name' => 'Carton']);
        $dataCargoTypes->insertOrIgnore(['id' => 3, 'name' => 'Woodenbox']);
        $dataCargoTypes->insertOrIgnore(['id' => 4, 'name' => 'Big bag']);
        $dataCargoTypes->insertOrIgnore(['id' => 5, 'name' => 'Container']);

        //Cargos INSERT
        $dataCargos->insertOrIgnore(['cargo_type_id' => 1, 'qty' => 10, 'weight' => 1200, 'description' => '120x80x140']);

        //Addresses INSERT
        $dataAddresses->insertOrIgnore(['id' => 1, 'country' => 'Poland', 'city' => 'Wrocław', 'postcode' => '50-222', 'street' => 'Graniczna', 'street_number' => 8, 'name' => 'Leader Logistics']);
        $dataAddresses->insertOrIgnore(['id' => 2, 'country' => 'Poland', 'city' => 'Warszawa', 'postcode' => '00-101', 'street' => 'Wirażowa', 'street_number' => 35, 'name' => 'Taksimpol']);

        //Freights INSERT
        $dataFreights->insert(['start_address_id' => 1, 'end_address_id' => 1, 'start_date' => Carbon::createFromDate(2020, 01, 01), 'start_time_from' => Carbon::createFromTime(7, 30), 'start_time_to' => Carbon::createFromTime(14, 0), 'end_date' => Carbon::createFromDate(2021, 01, 02), 'end_time_from' => Carbon::createFromTime(8, 0), 'end_time_to' => Carbon::createFromTime(16, 0), 'truck_type_id' => 1, 'truck_id' => 1, 'cargo_type_id' => 1, 'cargo_id' => 1, 'freight_type_id' => 1, 'forwarder_id' => 1, 'created_at' => Carbon::now(), 'status_id' => 1]);

        //Freight types INSERT
        $dataFreightTypes->insertOrIgnore(['id' => 1, 'name' => 'FTL']);
        $dataFreightTypes->insertOrIgnore(['id' => 2, 'name' => 'LTL']);

        //Users INSERT
        $dataUsers->insertOrIgnore(['id' => 1, 'name' => 'Adam Spedytor', 'email' => 'spedycja@transport.pl', 'password' => 'password', 'phone_number' => '+48 125 452 145']);


        //$freights = Freight::all();

        $freights = Freight::active()
            ->simplePaginate(10);

        //dd($freightsE);
        return view('freight.list', [
            'freights' => $freights
        ]);
    }

    public function details(int $freightId)
    {
        $freight = Freight::find($freightId);

        return view('freight.details', [
            'freight' => $freight
        ]);
    }
}
