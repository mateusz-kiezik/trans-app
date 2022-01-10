<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use App\Models\Freight;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FreightController extends Controller
{
    public function show(): View
    {
        $truckTypes = DB::table('truck_types');
        $trucks = DB::table('trucks');
        $cargoTypes = DB::table('cargo_types');
        $cargos = DB::table('cargos');
        $addresses = DB::table('addresses');
        $freights = DB::table('freights');
        $users = DB::table('users');
        $freightTypes = DB::table('freight_types');

        //Truck types INSERT
        $truckTypes->insertOrIgnore(['id' => 1, 'name' => 'Bus']);
        $truckTypes->insertOrIgnore(['id' => 2, 'name' => 'Solo']);
        $truckTypes->insertOrIgnore(['id' => 3, 'name' => "Semi-trailer"]);

        //Trucks INSERT
        $trucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Standard']);
        $trucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Curtain']);
        $trucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Box']);
        $trucks->insertOrIgnore(['truck_type_id' => 1 and 2 and 3, 'name' => 'Refrigerator']);
        $trucks->insertOrIgnore(['truck_type_id' => 1, 'name' => 'Mega']);
        $trucks->insertOrIgnore(['truck_type_id' => 1, 'name' => 'Container semi-trailer']);

        //Cargo types INSERT
        $cargoTypes->insertOrIgnore(['id' => 1, 'name' => 'Pallet']);
        $cargoTypes->insertOrIgnore(['id' => 2, 'name' => 'Carton']);
        $cargoTypes->insertOrIgnore(['id' => 3, 'name' => 'Woodenbox']);
        $cargoTypes->insertOrIgnore(['id' => 4, 'name' => 'Big bag']);
        $cargoTypes->insertOrIgnore(['id' => 5, 'name' => 'Container']);

        //Cargos INSERT
        $cargos->insertOrIgnore(['cargo_type_id' => 1, 'qty' => 10, 'weight' => 1200, 'description' => '120x80x140']);

        //Addresses INSERT
        $addresses->insertOrIgnore(['id' => 1, 'country' => 'Poland', 'city' => 'Wrocław', 'postcode' => '50-222', 'street' => 'Graniczna', 'street_number' => 8, 'name' => 'Leader Logistics']);
        $addresses->insertOrIgnore(['id' => 2, 'country' => 'Poland', 'city' => 'Warszawa', 'postcode' => '00-101', 'street' => 'Wirażowa', 'street_number' => 35, 'name' => 'Taksimpol']);

        //Freights INSERT
        $freights->insert(['start_address_id' => 1, 'end_address_id' => 1, 'start_date' => Carbon::createFromDate(2020, 01, 01), 'start_time_from' => Carbon::createFromTime(7, 30), 'start_time_to' => Carbon::createFromTime(14, 0), 'end_date' => Carbon::createFromDate(2021, 01, 02), 'end_time_from' => Carbon::createFromTime(8, 0), 'end_time_to' => Carbon::createFromTime(16, 0), 'truck_type_id' => 1, 'truck_id' => 1, 'cargo_type_id' => 1, 'cargo_id' => 1, 'freight_type_id' => 1, 'forwarder_id' => 1, 'created_at' => Carbon::now()]);

        //Freight types INSERT
        $freightTypes->insertOrIgnore(['id' => 1, 'name' => 'FTL']);
        $freightTypes->insertOrIgnore(['id' => 2, 'name' => 'LTL']);

        //Users INSERT
        $users->insertOrIgnore(['id' => 1, 'name' => 'Adam Spedytor', 'email' => 'spedycja@transport.pl', 'password' => 'password']);


        $freightsE = Freight::all();


        return view('freight.list', [
            'freights' => $freightsE
        ]);
    }
}
