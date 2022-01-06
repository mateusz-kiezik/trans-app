<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class MainPageController extends Controller
{
    public function show()
    {
        return view('home.main');
    }
}
