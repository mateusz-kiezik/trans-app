<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FreightController extends Controller
{
    public function show(): View
    {
        return view('freight.list');
    }
}
