<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('vehicles', VehicleController::class);
Route::resource('customers', CustomerController::class);
Route::resource('rentals', RentalController::class);


