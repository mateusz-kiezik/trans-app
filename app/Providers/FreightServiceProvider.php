<?php

namespace App\Providers;

use App\Repository\Eloquent\FreightRepository;
use App\Repository\FreightRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class FreightServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            FreightRepositoryInterface::class,
            FreightRepository::class
        );
    }

}
