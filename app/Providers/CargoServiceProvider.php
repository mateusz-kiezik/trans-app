<?php

namespace App\Providers;

use App\Repository\CargoRepositoryInterface;
use App\Repository\Eloquent\CargoRepository;
use Illuminate\Support\ServiceProvider;

class CargoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            CargoRepositoryInterface::class,
            CargoRepository::class
        );
    }

}
