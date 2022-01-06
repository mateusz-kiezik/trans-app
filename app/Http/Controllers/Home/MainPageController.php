<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function show(): View
    {
        return view('home.main');
    }
}
