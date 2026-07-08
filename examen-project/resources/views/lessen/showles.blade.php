@extends ("layouts.app")
@section("content")

<body>

<h1>{{ $les->naam}}</h1>
<h2>{{ $les->onderwerp}}</h2>
<p>{{ $les->beschrijving}}</p>

<div>
    <img src="https://static.wikia.nocookie.net/mysingingmonsters/images/4/46/Drumpler.png/revision/latest?cb=20251207100009" alt="sams buik">
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
