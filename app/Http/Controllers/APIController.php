<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function call(Request $request)
    {
        $response = Http::get('https://api.geoapify.com/v1/geocode/autocomplete?', [
            'apiKey' =>  env('GEO_API_KEY'),
            'limit' => 5,
            'lang' => 'pl',
            'type' => 'city',
            'text' => $request->get('text')
        ]);

        return $response->json();
    }
}
