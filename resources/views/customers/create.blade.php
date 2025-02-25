@extends('layouts.app')

@section('title', 'Registrazione Cliente')

@section('content')
    <div class="flex flex-col items-center text-center pt-8 px-8 bg-[#f8f5f0] min-h-screen">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-8">Aggiungi Cliente</h1>
        <p class="text-lg text-gray-700 max-w-2xl mb-12">Inserisci i dati del cliente per completare la registrazione.</p>

        <form action="{{ route('customers.store') }}" method="POST" class="bg-white p-10 rounded-2xl shadow-lg max-w-2xl w-full text-left">
            @csrf
            <input type="text" name="name" placeholder="Nome" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
            <input type="email" name="email" placeholder="Email" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
            <input type="text" name="phone" placeholder="Telefono" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
            <input type="text" name="license_number" placeholder="Numero Patente" required class="w-full p-3 mb-6 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
            <button type="submit" class="bg-yellow-300 transition transform hover:scale-105 text-black font-bold px-6 py-3 rounded-2xl text-lg mb-12 w-full">Salva</button>
        </form>
    </div>
@endsection

