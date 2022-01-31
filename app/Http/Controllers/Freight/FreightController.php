<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFreight;
use App\Repository\AddressRepositoryInterface;
use App\Repository\Eloquent\AddressRepository;
use App\Repository\Eloquent\CargoRepository;
use App\Repository\Eloquent\FreightRepository;
use App\Repository\FreightRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class FreightController extends Controller
{
    private FreightRepository $freightRepository;
    private AddressRepository $addressRepository;
    private CargoRepository $cargoRepository;


    public function __construct(FreightRepositoryInterface $freightRepository, AddressRepositoryInterface $addressRepository, CargoRepository $cargoRepository)
    {
        $this->freightRepository = $freightRepository;
        $this->addressRepository = $addressRepository;
        $this->cargoRepository = $cargoRepository;
    }


    public function list(): View
    {
        $freights = $this->freightRepository->allActive();

        foreach ($freights as $freight) {

            $freight->truck_id = json_decode($freight->truck_id);
        }

        return view('freight.list', [
            'freights' => $freights
        ]);
    }


    public function details(Request $request, int $freightId)
    {
        $freight = $this->freightRepository->get($freightId);

        $freight->truck_id = json_decode($freight->truck_id);

        return view('freight.details', [
            'freight' => $freight
        ]);
    }

    public function new()
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }
        return view('freight.new');
    }

    public function save(CreateFreight $request)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }
        $loadingAddress = $request->get('loadingAddress');
        $unloadingAddress = $request->get('unloadingAddress');
        $loadingAddressId = $this->addressRepository->createAndGetId($loadingAddress);
        $unloadingAddressId = $this->addressRepository->createAndGetId($unloadingAddress);
        $cargoId = $this->cargoRepository->createAndGetId($request->only(
            'cargoType', 'quantity', 'weight', 'description'
        ));
        $userId = Auth::id();


        $data = ['start_address_id' => $loadingAddressId,
            'end_address_id' => $unloadingAddressId,
            'start_date' => $request->get('loadingDate'),
            'start_time_from' => $request->get('loadingTime'),
            'end_date' => $request->get('unloadingDate'),
            'end_time_from' => $request->get('unloadingTime'),
            'truck_type_id' => $request->get('truckSize'),
            'truck_id' => array_unique($request->get('truckType')),
            'cargo_id' => $cargoId,
            'freight_type_id' => $request->get('freightType'),
            'forwarder_id' => $userId];

        $freightId = $this->freightRepository->createAndGetId($data);

        return redirect()->action([FreightController::class, 'details'], ['id' => $freightId])->with('status', 'New freight created');
    }

    public function disable(Request $request)
    {
        if (!Gate::allows('forwarder-level')) {
            abort(403);
        }

        $freightId = $request->get('freightId');
        $this->freightRepository->updateStatus($freightId, false);

        return redirect()->action([FreightController::class, 'list'])->with('status', 'Freight deleted');
    }
}
