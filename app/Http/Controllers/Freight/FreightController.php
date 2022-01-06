<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FreightController extends Controller
{
    public function show(): View
    {






        return view('freight.list');
    }
}
