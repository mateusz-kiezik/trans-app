<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewUserCreatePassword;
use App\Repository\AddressRepositoryInterface;
use App\Repository\Eloquent\AddressRepository;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class AddressController extends Controller
{
    private AddressRepository $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }


    public function index()
    {





//        $response = Http::get('https://api.geoapify.com/v1/geocode/search', [
//            'apiKey' => '46f5916ec7204f9fad8e582a976405c1',
//            'limit' => 1,
//            'format' => 'json',
//            'postcode' => '50-505'
//        ]);

        $addresses = $this->addressRepository->all();




//        dd($data);


        return view('home.api', [
            'addresses' => $addresses
        ]);

//        $response = Http::get('https://geocode.xyz/52.1254,12.1444', [
//            'auth' => '152431009010541e15936487x101633',
//            'json' => 1,
//        ]);


    }

    public function getByPostcode($postcode)
    {
        $response = Http::get('https://api.geoapify.com/v1/geocode/search', [
           'apiKey' =>  '46f5916ec7204f9fad8e582a976405c1',
            'limit' => 1,
            'format' => 'json',
            'lang' => 'en',
            'postcode' => $postcode
        ]);

        $json = json_decode($response->body());
        $data = $json->results;

        return $data;
    }

    public function getByCity($city)
    {
        $response = Http::get('https://api.geoapify.com/v1/geocode/search', [
            'apiKey' =>  '46f5916ec7204f9fad8e582a976405c1',
            'limit' => 1,
            'format' => 'json',
            'lang' => 'en',
            'city' => $city
        ]);

        $json = json_decode($response->body());
        $data = $json->results;



//        $responsePostcode = Http::get('https://api.geoapify.com/v1/geocode/reverse', [
//            'apiKey' =>  '46f5916ec7204f9fad8e582a976405c1',
//            'limit' => 1,
//            'format' => 'json',
//            'lang' => 'en',
//            'lat' => $lat,
//            'lon' => $lon
//        ]);
//
//        $json2 = json_decode($responsePostcode->body());
//        $data2 = $json->results;
//
//        dd($data2);

        return $data;
    }
}
