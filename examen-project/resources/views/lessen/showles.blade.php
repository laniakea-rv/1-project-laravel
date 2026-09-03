@extends ("layouts.app")

@section("content")

    <body class="bg-gray-100">

        <div class="w-5/6 mx-auto mt-10">

            <h1 class="text-2xl font-bold">{{ $les->naam}}</h1>
            <h2 class="text-lg font-semibold mt-2">{{ $les->onderwerp}}</h2>
            <p class="mt-2">{{ $les->beschrijving}}</p>

            <div class="bg-white p-5 mt-4">

                @forelse($les->videos as $video)

                    <h3 class="text-xl font-bold mb-3">{{ $video->naam }}</h3>
                    <iframe width="560" height="315" src="{{ $video->bestand }}" class="max-w-full" allowfullscreen>
                    </iframe>

                @empty

                    <p>Geen video beschikbaar</p>

                @endforelse

            </div>

            <form method="POST" action="{{ route('lessen.lesindex', $les) }}" class="mt-4">

                @csrf

                <button type="submit" class="bg-gray-200 px-3 py-1">

                    Les afronden

                </button>

            </form>

            <a href="/lessen" class="text-blue-600 hover:underline">Terug!!</a>

        </div>

    </body>

@endsection