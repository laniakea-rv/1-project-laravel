<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <nav>
        <div class="bg-gray-300 flex justify-evenly p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-white text-black px-4 py-2 rounded shadow hover:bg-gray-400">
                    Uitloggen
                </button>
            </form>
            <a href="{{ route('muziek') }}" class="bg-white text-black px-6 py-3 rounded shadow hover:bg-gray-400">
                Muziek kopen
            </a>
            <a href="{{ route('liveStream') }}"
                class="bg-white text-black px-6 py-3 rounded shadow hover:bg-gray-400">
                Stream
            </a>
            <p class="text-5xl">Welkom, {{ Auth::user()->name }}</p>
            <a href="{{ route('workshops') }}"
                class="bg-white text-black px-6 py-3 rounded shadow hover:bg-gray-400">
                Workshops
            </a>
            <a href="{{ route('abonnementen') }}"
                class="bg-white text-black px-6 py-3 rounded shadow hover:bg-gray-400">
                Abonnementen
            </a>
            <a href="{{ route('lessen') }}" class="bg-white text-black px-6 py-3 rounded shadow hover:bg-gray-400">
                Lessen
            </a>
        </div>
    </nav>
    <div>

        @yield('content')

    </div>
</body>

</html>