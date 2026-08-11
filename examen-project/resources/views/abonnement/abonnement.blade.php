@extends('layouts.app')
@section('content')
<div class="flex justify-center">
    <div class="bg-gray-300 text-black mt-10 w-6/7 rounded shadow pt-3">
        @if(session('error'))
            <p class="text-red-600 p-3">
                {{ session('error') }}
            </p>
        @endif
        @if(session('success'))
            <p class="text-green-600 p-3">
                {{ session('success') }}
            </p>
        @endif
        @foreach ($abonnementen as $item)

            <div class="flex justify-center">
                <div class="bg-gray-100 mt-3 w-5/6 rounded shadow p-4">
                    <p>
                        <strong>{{ $item->naam }}</strong>
                    </p>
                    <p>
                        {{ $item->beschrijving }}
                    </p>
                    <p>
                        €{{ $item->prijs }}
                    </p>
                    <form action="{{ route('saveUserAbonnement') }}" method="POST">
                        @csrf
                        <input
                            type="hidden"
                            name="id"
                            value="{{ $item->id }}"
                        >
                        <button type="submit">
                            Aanschaffen
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
        @if($huidigAbonnement)
            <div class="p-4">
                <p>
                    Jouw abonnement nu is:
                    {{ $huidigAbonnement->abonnementtype->naam }}
                </p>

                <form
                    action="{{ route('opzeggenUserAbonnement') }}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <button class="bg-red-800 px-3 text-white rounded" type="submit">
                        Abonnement opzeggen
                    </button>
                </form>
            </div>
        @else

            <p class="p-4">
                Je hebt nog geen actief abonnement, laten we dat veranderen.
            </p>

        @endif

    </div>
</div>

@endsection
