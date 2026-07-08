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

<body >
    <nav>
        <div class="bg-blue-500 flex justify-evenly p-4">
            <a href="{{ route('abonnementen') }}">Abonnementen</a>
            <a href="{{ route('lessen') }}">Lessen</a>
            <a href="{{ route('muziek') }}">Muziek</a>
            <a href="{{ route('liveStream') }}">Stream</a>
        </div>
    </nav>
    <div>

        @yield('content')

    </div>
</body>
</html>