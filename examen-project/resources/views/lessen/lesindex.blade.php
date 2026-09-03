@extends ("layouts.app")
@section("content")

    <div class="w-5/6 mx-auto mt-10">

        @if(auth()->user()->is_admin)
            <a href="{{ route('lessen.lescreate') }}">
                <button type="button" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">Les aanmaken</button>
            </a>
        @endif

        <form method="GET" action="{{ route('lessen') }}" class="bg-white p-5 mt-6">
            <label for="onderwerp" class="font-bold">Onderwerp:</label>

            <select name="onderwerp" id="onderwerp" onchange="this.form.submit()"
                class="border border-gray-300 rounded px-3 py-2 ml-2">
                <option value="">Alle onderwerpen</option>

                @foreach($onderwerp as $subject)
                    <option value="{{ $subject }}" {{ $kiesOnderwerp == $subject ? 'selected' : '' }}>
                        {{ $subject }}
                    </option>
                @endforeach
            </select>
        </form>

        <form method="GET" action="{{ route('lessen') }}" class="bg-white p-5 mt-4">
            <input type="text" name="search" placeholder="Zoek een les..." value="{{ $search ?? '' }}"
                class="border border-gray-300 rounded px-3 py-2">

            <button type="submit" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">
                Zoeken
            </button>
        </form>

        <h1 class="text-2xl font-bold mt-6">Alle lessen</h1>

        <ul class="mt-4 space-y-4">
            @forelse ($lessen as $les)

                @if($loop->first && $progressie)
                    <strong>Laatst bekeken</strong>
                @endif

                <li class="les {{ $les->klasse }} bg-white p-5">
                    <h2 class="text-xl font-bold">{{ $les->naam }}</h2>

                    <p class="mt-2">{{ $les->beschrijving }}</p>

                    <p class="mt-2">Status: {{ $les->statusTekst }}</p>

                    <a href="{{ route('lessen.show', $les) }}"
                        class="inline-block bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded mt-4">
                        Bekijk les
                    </a>
                </li>

            @empty
                <li class="bg-white p-5">LES BESTAAT NIET RAHHHHHHH</li>
            @endforelse
        </ul>

    </div>

@endsection