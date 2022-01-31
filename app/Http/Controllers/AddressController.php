<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewUserCreatePassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class AddressController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(62);

        Notification::send($user, new NewUserCreatePassword());
        dd('success');



//        $geo1 = '51.085971';
//        $geo2 = '17.070374';


//        $response = Http::get('https://geocode.xyz/'.$geo1.','.$geo2, [
//            'auth' => '152431009010541e15936487x101633',
//            'json' => 1,
//        ]);
//        $response = Http::get('https://api.geoapify.com/v1/geocode/search', [
//            'apiKey' => '46f5916ec7204f9fad8e582a976405c1',
//            'limit' => 1,
//            'format' => 'json',
//            'postcode' => '50-505'
//        ]);
//
//
//        dd(json_decode($response->body()));
    }
}
