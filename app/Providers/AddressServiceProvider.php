<?php

namespace App\Providers;

use App\Repository\AddressRepositoryInterface;
use App\Repository\Eloquent\AddressRepository;
use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            AddressRepositoryInterface::class,
            AddressRepository::class
        );
    }

}
