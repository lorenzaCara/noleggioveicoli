@extends('layouts.app')

@section('title', 'Nuovo Noleggio')

@section('content')
    <div class="flex flex-col items-center text-center pt-8 px-8 bg-[#f8f5f0] min-h-screen">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-8">Nuovo Noleggio</h1>
        <p class="text-lg text-gray-700 max-w-2xl mb-12">Seleziona il veicolo, il cliente e le date per creare un nuovo noleggio.</p>

        <form action="{{ route('rentals.store') }}" method="POST" class="bg-white p-10 rounded-2xl shadow-lg max-w-2xl w-full text-left">
            @csrf
            <label for="vehicle_id" class="block text-gray-700 font-medium mb-2">Veicolo:</label>
            <select name="vehicle_id" id="vehicle_id" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }}</option>
                @endforeach
            </select>

            <label for="customer_id" class="block text-gray-700 font-medium mb-2">Cliente:</label>
            <select name="customer_id" id="customer_id" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>

            <label for="start_time" class="block text-gray-700 font-medium mb-2">Data Inizio:</label>
            <input type="datetime-local" name="start_time" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">

            <label for="end_time" class="block text-gray-700 font-medium mb-2">Data Fine:</label>
            <input type="datetime-local" name="end_time" required class="w-full p-3 mb-6 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">

            <button type="submit" class="bg-yellow-300 transition transform hover:scale-105 text-black font-bold px-6 py-3 rounded-2xl text-lg mb-12 w-full">Salva</button>
        </form>
    </div>
@endsection


