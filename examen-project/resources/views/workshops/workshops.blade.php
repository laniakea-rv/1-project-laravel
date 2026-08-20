@extends ("layouts.app")
@section("content")

    <body>
        <div>
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif
            @foreach ($workshops as $workshop)
                <tr>
                    @if($workshop->afbeelding)
                        <td>
                            <img src="{{ asset('storage/' . $workshop->afbeelding) }}">
                        </td>
                    @endif
                    <td>{{ $workshop->naam }}</td>
                    <td>{{ $workshop->tijd }}</td>
                    <td>{{ $workshop->locatie }}</td>
                    <td>
                        <a href="{{ route('workshop.show', $workshop->id) }}">
                            Bekijk workshop
                        </a>
                        @if(auth()->user()->workshops->contains($workshop->id))
                            <small>Al ingeschreven</small>
                        @endif
                    </td>
                </tr>
                <br>
            @endforeach
            @if(auth()->user() && auth()->user()->is_admin)
                <td><a href="{{ route('workshop.create') }}">
                        maak workshop aan
                    </a></td>
            @endif
        </div>
    </body>
@endsection