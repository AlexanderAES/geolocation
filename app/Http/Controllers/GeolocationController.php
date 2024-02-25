<?php

namespace App\Http\Controllers;

use App\Contracts\GeolocationRequestServiceInterface;
use App\Contracts\GeolocationServiceInterface;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function geocode(Request $request, GeolocationServiceInterface $geolocationService,
                            GeolocationRequestServiceInterface $geolocationRequestService)
    {
        $apiKey = env('API_KEY');;
        $geocode = $request->input('geocode');
        $lang = $request->input('lang', 'ru_RU');
        $kind = $request->input('kind', 'metro');
        $rspn = $request->input('rspn', 0);
        $results = $request->input('lang', 5);

        $requestData = [
            'geocode' => $geocode
        ];

        $uniqueRequest = $geolocationRequestService->saveGeolocationRequest($requestData);
        $data = $geolocationService->geoLocationAddress($apiKey, $geocode, $lang, $kind, $rspn, $results);

        return response()->json($data);
    }
}
