<?php

namespace App\Providers;

use App\Contracts\GeolocationServiceInterface;
use App\Services\GeolocationService;
use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            GeolocationServiceInterface::class,
            GeolocationService::class
        );
    }

}
