<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\FreightRepository;
use App\Repository\FreightRepositoryInterface;
use Illuminate\View\View;

class MainPageController extends Controller
{
    private FreightRepository $freightRepository;

    public function __construct(FreightRepositoryInterface $freightRepository)
    {
        $this->freightRepository = $freightRepository;
    }

    public function show(): View
    {
        $freights = $this->freightRepository->getFiveNewest();

        foreach ($freights as $freight) {

            $freight->truck_id = json_decode($freight->truck_id);
        }

        return view('home.main', [
            'freights' => $freights
        ]);
    }
}
