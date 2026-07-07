<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Lessen</title>
</head>

<body>

    <h1>Alle lessen</h1>

    <ul>
        @forelse ($lessen as $les)
            @if($loop->first && $laatsteVoortgang)
                <strong>Laatst bekeken</strong>
            @endif

            <li class="{{ $les->klasse }}">
                <h2>{{ $les->naam }}</h2>
                <p>{{ $les->beschrijving }}</p>

                <p>Status: {{ $les->statusTekst }}</p>

                <a href="{{ route('lessen.show', $les) }}">
                    Bekijk les
                </a>
            </li>
        @empty
            <a
                href="https://cdn.discordapp.com/attachments/1427970069811691554/1491735360428838983/image0.jpg?ex=6a4632d1&is=6a44e151&hm=c94dc0fb00a254ecf4f8eafb346cd420ac9f180a30521a9054f36a7dacc09c26&">
                <li>ER IS NOG GEEN LES RAHHHH</li>
            </a>
        @endforelse
    </ul>

</body>

</html>