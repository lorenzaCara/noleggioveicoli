<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource routes per la gestione dei veicoli, clienti e noleggi
Route::resource('vehicles', VehicleController::class);
Route::resource('customers', CustomerController::class);
Route::resource('rentals', RentalController::class);

// Route per completare un noleggio
Route::post('/rentals/{rental}/complete', [RentalController::class, 'complete'])->name('rentals.complete');
