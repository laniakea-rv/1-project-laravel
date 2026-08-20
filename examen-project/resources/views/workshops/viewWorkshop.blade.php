@extends("layouts.app")

@section("content")

    <body>
        <div>
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif

            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            @if ($workshop)
                <a href="{{ route('workshops') }}">terug naar workshops</a>

                <tr>
                    @if($workshop->afbeelding)
                        <td>
                            <img src="{{ asset('storage/' . $workshop->afbeelding) }}">
                        </td>
                    @endif

                    <td>{{ $workshop->naam }}</td>

                    <td>
                        <p>
                            {{ $workshop->beschrijving }}
                        </p>
                    </td>

                    <td>{{ $workshop->tijd }}</td>
                    <td>{{ $workshop->locatie }}</td>

                    <td>
                        @if(auth()->user()->workshops->contains($workshop->id))
                            <button type="button" disabled>
                                al ingeschreven
                            </button>
                        @else
                            <form action="{{ route('workshop.inschrijven') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $workshop->id }}">
                                <button type="submit">
                                    inschrijven
                                </button>
                            </form>
                        @endif
                    </td>
                    @if(auth()->user() && auth()->user()->is_admin)
                        <td>
                            <a href="{{ route('workshop.edit', $workshop->id) }}">
                                bewerk workshop
                            </a>
                        </td>
                    @endif
                </tr>
            @endif
        </div>
    </body>
@endsection