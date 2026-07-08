@extends ("layouts.app")
@section("content")

<body>

<h1>{{ $les->naam}}</h1>
<h2>{{ $les->onderwerp}}</h2>
<p>{{ $les->beschrijving}}</p>

<div>

    @forelse($les->videos as $video)

        <h3>{{ $video->naam }}</h3>

        <iframe
            width="560"
            height="315"
            src="{{ $video->bestand }}"
            allowfullscreen>
        </iframe>

    @empty

        <p>Geen video beschikbaar.</p>

    @endforelse
</div>
<form method="POST" action="{{ route('lessen.lesindex', $les) }}">
    @csrf

    <button type="submit">
        Les afronden
    </button>
</form>
<a href="/lessen">Terug!!</a>

</body>
@endsection
