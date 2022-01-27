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

//dd($freights);
        return view('home.main', [
            'freights' => $freights
        ]);
    }
}
