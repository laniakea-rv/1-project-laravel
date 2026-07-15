@extends("layouts.home")
@section("content")

<div class="min-h-screen bg-cover bg-center" style="background-image: url('/images/amp.jpeg')">

    <div class="text-center text-white py-50">

        <div class="flex justify-evenly p-4">

            <a href="{{ route('lessen') }}"
               class="bg-gray-300 text-black px-6 py-3 rounded shadow hover:bg-gray-400">
               Lessen
            </a>

            <a href="{{ route('muziek') }}"
               class="bg-gray-300 text-black px-6 py-3 rounded shadow hover:bg-gray-400">
               Muziek kopen
            </a>

            <a href="{{ route('liveStream') }}"
               class="bg-gray-300 text-black px-6 py-3 rounded shadow hover:bg-gray-400">
               Stream
            </a>

            <a href="https://c.tenor.com/Zc0YP-vwW0IAAAAd/tenor.gif"
               class="bg-gray-300 text-black px-6 py-3 rounded shadow hover:bg-gray-400">
               Workshops
            </a>

        </div>

        <div class="mt-6">
            <a href="{{ route('abonnementen') }}"
               class="bg-gray-300 text-black px-6 py-3 rounded shadow hover:bg-gray-400">
               Abonnementen
            </a>
        </div>
    </div>

</div>
@endsection
