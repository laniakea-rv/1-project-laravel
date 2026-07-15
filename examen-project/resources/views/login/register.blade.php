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
<nav class="bg-green-900 text-white px-6 py-4 flex items-center justify-center shadow-md font-bold text-2xl">registreer</nav>
<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow mt-8">
    <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-4">
        @csrf

        <div>
            <label for="name" class="block mb-1 font-medium">naam</label>
            <input type="text" id="name" name="name" value="name" required class="border p-2 rounded w-full">
        </div>

        <div>
            <label for="email" class="block mb-1 font-medium">email</label>
            <input type="email" id="email" name="email" value="email" required class="border p-2 rounded w-full">
        </div>

        <div>
            <label for="password" class="block mb-1 font-medium">wachtwoord</label>
            <input type="password" id="password" name="password" required class="border p-2 rounded w-full">
        </div>

        <div>
            <label for="password_confirmation" class="block mb-1 font-medium">herhaal wachtwoord</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="border p-2 rounded w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
            Registreer
        </button>

        <span class="text-center">of</span>

        <a href="{{ route('login') }}" class="hover:text-red-500 transition text-black inline-block text-center">
            Login
        </a>

        @if ($errors->any())
            <div class="mt-4">
                @foreach ($errors->all() as $error)
                    <p class="text-red-500">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
</div>

</html>