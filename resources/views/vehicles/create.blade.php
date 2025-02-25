@extends('layouts.app')

@section('title', isset($vehicle) ? 'Modifica Veicolo' : 'Aggiungi Veicolo')

@section('content')
    <div class="flex flex-col items-center text-center pt-8 px-8 bg-[#f8f5f0] min-h-screen">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-8">{{ isset($vehicle) ? 'Modifica Veicolo' : 'Aggiungi Veicolo' }}</h1>
        <p class="text-lg text-gray-700 max-w-2xl mb-12">Compila i dettagli del veicolo per aggiornare o aggiungere un nuovo mezzo al sistema.</p>

        <div class="bg-white p-10 rounded-2xl max-w-2xl w-full">
            <form action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}" method="POST" class="flex flex-col space-y-6">
                @csrf
                @if(isset($vehicle)) 
                    @method('PUT') 
                @endif

                <input type="text" name="model" value="{{ $vehicle->model ?? '' }}" placeholder="Modello" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">

                <select name="type" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    <option value="car" {{ isset($vehicle) && $vehicle->type == 'car' ? 'selected' : '' }}>Auto</option>
                    <option value="scooter" {{ isset($vehicle) && $vehicle->type == 'scooter' ? 'selected' : '' }}>Scooter</option>
                    <option value="bike" {{ isset($vehicle) && $vehicle->type == 'bike' ? 'selected' : '' }}>Bici</option>
                </select>

                <input type="number" name="battery_capacity" value="{{ $vehicle->battery_capacity ?? '' }}" placeholder="Capacità Batteria" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">

                <input type="number" step="0.01" name="hourly_rate" value="{{ $vehicle->hourly_rate ?? '' }}" placeholder="Tariffa Oraria" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">

                <select name="status" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    <option value="available" {{ isset($vehicle) && $vehicle->status == 'available' ? 'selected' : '' }}>Disponibile</option>
                    <option value="rented" {{ isset($vehicle) && $vehicle->status == 'rented' ? 'selected' : '' }}>Noleggiato</option>
                    <option value="maintenance" {{ isset($vehicle) && $vehicle->status == 'maintenance' ? 'selected' : '' }}>In Manutenzione</option>
                </select>

                <button type="submit" class="bg-yellow-300 transition transform hover:scale-105 text-black font-bold px-6 py-3 rounded-2xl text-lg mb-12">Salva</button>
            </form>
        </div>
    </div>
@endsection
