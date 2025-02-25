@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col items-center text-center py-24 px-8 bg-[#f8f5f0] min-h-screen">
        <h1 class="text-5xl md:text-7xl lg:text-7xl font-extrabold text-gray-900 mb-10 leading-tight">Noleggio Veicoli<br> Semplice e Veloce</h1>
        <p class="text-base md:text-lg text-gray-700 max-w-2xl mb-12">Gestisci facilmente il noleggio dei tuoi veicoli con un sistema intuitivo e moderno.</p>
        
        <div class="grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1 mx-auto gap-6 md:gap-8 max-w-5xl w-full px-4">
            <a href="{{ route('vehicles.index') }}" 
               class="flex flex-col items-center p-6 md:p-8 rounded-2xl bg-yellow-300 transition transform hover:scale-105 w-full lg:max-w-xs">
                <span class="font-semibold text-gray-900 text-xl md:text-2xl">Gestisci Veicoli</span>
            </a>
            
            <a href="{{ route('customers.index') }}" 
               class="flex flex-col items-center p-6 md:p-8 rounded-2xl bg-yellow-300 transition transform hover:scale-105 w-full lg:max-w-xs">
                <span class="font-semibold text-gray-900 text-xl md:text-2xl">Gestisci Clienti</span>
            </a>

            <a href="{{ route('rentals.index') }}" 
               class="flex flex-col items-center p-6 md:p-8 rounded-2xl bg-yellow-300 transition transform hover:scale-105 w-full lg:max-w-xs">
                <span class="font-semibold text-gray-900 text-xl md:text-2xl">Gestisci Noleggi</span>
            </a>
        </div>
    </div>
@endsection