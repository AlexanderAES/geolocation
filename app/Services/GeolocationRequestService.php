<?php

namespace App\Services;

use App\Contracts\GeolocationRequestServiceInterface;
use App\Models\GeolocationRequest;
use Illuminate\Support\Facades\Log;

class GeolocationRequestService implements GeolocationRequestServiceInterface
{
    public function saveGeolocationRequest($requestData)
    {
        $request = GeolocationRequest::firstOrCreate($requestData);

        if ($request) {
            Log::info('Request saved successfully: ' . $request->id);
        } else {
            Log::error('Failed to save request.');
        }

        return $request;
    }
}
