<?php

use App\Http\Controllers\GeolocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GeolocationController::class, 'index'])->name('home');

Route::post('/geolocations', [GeolocationController::class, 'geocode'])->name('geolocation');


