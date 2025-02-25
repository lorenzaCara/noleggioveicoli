@extends('layouts.app')

@section('title', 'Lista Clienti')

@section('content')
    <div class='flex flex-col items-center text-center pt-8 px-8 bg-[#f8f5f0] min-h-screen'>
        <h1 class="text-5xl font-extrabold text-gray-900 mb-8">Lista Clienti</h1>
        <p class="text-lg text-gray-700 max-w-2xl mb-4">Esplora la lista dei nostri clienti.</p>

        <a href="{{ route('customers.create') }}" class="bg-yellow-300 transition transform hover:scale-105 text-black font-bold px-6 py-3 rounded-2xl text-lg mb-12">Aggiungi Cliente</a>
        <div class='bg-white p-10 rounded-2xl max-w-3xl w-full'>
            <ul class="divide-y divide-gray-300">
                @foreach($customers as $customer)
                    <li class='py-4'>{{ $customer->name }} - {{ $customer->email }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
