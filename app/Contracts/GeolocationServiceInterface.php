<?php

namespace App\Contracts;

interface GeolocationServiceInterface
{
    public function geoLocationAddress($apiKey, $geocode, $lang, $kind, $rspn, $results);

}
