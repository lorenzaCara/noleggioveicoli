<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema di Noleggio Veicoli')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f8f5f0] text-gray-900 font-sans">
    <nav class="flex justify-between items-center py-6 px-10 max-w-6xl mx-auto">
        <a href="{{ route('home') }}" class="text-xl font-bold tracking-wide">Noleggio Veicoli</a>
        <div class="flex space-x-8 text-lg">
            <a href="{{ route('vehicles.index') }}" class="hover:underline">Veicoli</a>
            <a href="{{ route('customers.index') }}" class="hover:underline">Clienti</a>
            <a href="{{ route('rentals.index') }}" class="hover:underline">Noleggi</a>
        </div>
        <a href="#" class="bg-yellow-300 text-black px-5 py-2 rounded-full font-medium hover:bg-yellow-400">Prenota Ora</a>
    </nav>

    <div class="text-center py-20 px-6">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center py-6">
        <p class="text-sm">&copy; {{ date('Y') }} Noleggio Veicoli. Tutti i diritti riservati.</p>
    </footer>
</body>

</html>

