@extends('layouts.app')

@section('title', 'Dettaglio Veicolo')

@section('content')
    <div class="flex flex-col items-center text-center pt-8 px-8 bg-[#f8f5f0] min-h-screen">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-8">{{ $vehicle->model }}</h1>
        <p class="text-lg text-gray-700 max-w-2xl mb-12">Scopri i dettagli di questo veicolo e le sue caratteristiche.</p>

        <div class="bg-white p-10 rounded-2xl max-w-3xl w-full text-left">
            <p class="text-xl text-gray-900 font-bold mb-4">Tipo: <span class="font-normal">{{ $vehicle->type }}</span></p>
            <p class="text-xl text-gray-900 font-bold mb-4">Capacità Batteria: <span class="font-normal">{{ $vehicle->battery_capacity }} kWh</span></p>
            <p class="text-xl text-gray-900 font-bold mb-6">Tariffa oraria: <span class="font-normal">€{{ $vehicle->hourly_rate }}</span></p>

            <div class='flex gap-4 pt-8'>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" 
                    class="text-gray-500 hover:text-gray-700 transition transform hover:scale-105">
                    Modifica Veicolo
                </a>
        
                <!-- Form per eliminazione veicolo -->
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600 transition transform hover:scale-105">
                        Elimina Veicolo
                    </button>
                </form>
            </div>
        </div>

        <a href="{{ route('vehicles.index') }}" class="bg-yellow-300 hover:bg-yellow-400 transition transform hover:scale-105 text-black font-bold px-6 py-3 rounded-2xl text-lg my-12">
            ← Torna alla lista
        </a>
    </div>
@endsection
