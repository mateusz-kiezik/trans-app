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


}
