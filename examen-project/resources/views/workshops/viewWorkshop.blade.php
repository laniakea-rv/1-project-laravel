@extends("layouts.app")
@section("content")

    <body class="">
        <div class="w-5/6 mx-auto mt-10">
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif
            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif
            @if ($workshop)
                <a href="{{ route('workshops') }}">
                    terug naar workshops
                </a>
                <div class="bg-white p-5 mt-4">
                    @if($workshop->afbeelding)
                        <img src="{{ asset('storage/' . $workshop->afbeelding) }}" onerror="this.onerror=null; this.src='{{ asset('storage/default.png') }}';" class="w-64 h-64 object-cover"
                            alt="Workshop afbeelding">
                    @endif
                    <h1 class="text-2xl font-bold mt-4">
                        {{ $workshop->naam }}
                    </h1>
                    <p class="mt-2">
                        {{ $workshop->beschrijving }}
                    </p>
                    <p class="mt-2">
                        {{ $workshop->tijd }}
                    </p>
                    <p>
                        {{ $workshop->locatie }}
                    </p>
                    <div class="mt-4">
                        @if(auth()->user()->workshops->contains($workshop->id))
                            <button type="button" disabled class="bg-gray-200 px-3 py-1">
                                al ingeschreven
                            </button>
                        @else
                            <form action="{{ route('workshop.inschrijven') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $workshop->id }}">

                                <button type="submit" class="bg-gray-200 px-3 py-1">
                                    inschrijven
                                </button>
                            </form>
                        @endif
                    </div>
                    @if(auth()->user() && auth()->user()->is_admin)
                        <div class="mt-4">
                            <a href="{{ route('workshop.edit', $workshop->id) }}">
                                bewerk workshop
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </body>
@endsection