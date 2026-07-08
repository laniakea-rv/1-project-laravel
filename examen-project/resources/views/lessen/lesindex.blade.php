@extends ("layouts.app")
@section("content")

<form method="GET" action="{{ route('lessen') }}">
    <label for="onderwerp">Onderwerp:</label>

    <select name="onderwerp" id="onderwerp" onchange="this.form.submit()">
        <option value="">Alle onderwerpen</option>

        @foreach($onderwerp as $subject)
            <option value="{{ $subject }}" {{ $kiesOnderwerp == $subject ? 'selected' : '' }}>
                {{ $subject }}
            </option>
        @endforeach
    </select>
</form>

<form method="GET" action="{{ route('lessen') }}">
    <input type="text" name="search" placeholder="Zoek een les..." value="{{ $search ?? '' }}">

    <button type="submit">
        Zoeken
    </button>
</form>

<h1>Alle lessen</h1>

<ul>
    @forelse ($lessen as $les)

        @if($loop->first && $progressie)
            <strong>Laatst bekeken</strong>
        @endif

        <li class="les {{ $les->klasse }}">
            <h2>{{ $les->naam }}</h2>

            <p>{{ $les->beschrijving }}</p>

            <p>Status: {{ $les->statusTekst }}</p>

            <a href="{{ route('lessen.show', $les) }}">
                Bekijk les
            </a>
        </li>

    @empty
        <li>LES BESTAAT NIET RAHHHHHHH</li>
    @endforelse
</ul>

@endsection