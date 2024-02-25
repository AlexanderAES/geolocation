<?php

namespace App\Providers;

use App\Contracts\GeolocationRequestServiceInterface;
use App\Services\GeolocationRequestService;
use Illuminate\Support\ServiceProvider;

class GeolocationRequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            GeolocationRequestServiceInterface::class,
            GeolocationRequestService::class
        );
    }

}
