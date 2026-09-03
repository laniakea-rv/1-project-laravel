@extends ("layouts.app")
@section("content")

    <body class="bg-gray-100">
        <div class="w-5/6 mx-auto mt-10">

            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif

            @if(auth()->user() && auth()->user()->is_admin)
                <a href="{{ route('workshop.create') }}">
                    maak workshop aan
                </a>
            @endif

            <div class="mt-5">
                @foreach ($workshops as $workshop)

                    <div class="bg-white p-4 mb-4 flex items-center gap-4">

                        @if($workshop->afbeelding)
                            <img src="{{ asset('storage/' . $workshop->afbeelding) }}" onerror="this.onerror=null; this.src='{{ asset('storage/default.png') }}';" class="w-24 h-24 object-cover"
                                alt="Workshop afbeelding">
                        @endif

                        <div>
                            <p class="font-bold">{{ $workshop->naam }}</p>
                            <p>{{ $workshop->tijd }}</p>
                            <p>{{ $workshop->locatie }}</p>

                            @if(auth()->user()->workshops->contains($workshop->id))
                                <small>Al ingeschreven</small>
                            @endif
                        </div>

                        <a class="ml-auto" href="{{ route('workshop.show', $workshop->id) }}">
                            Bekijk workshop
                        </a>

                    </div>

                @endforeach
            </div>

        </div>
    </body>
@endsection