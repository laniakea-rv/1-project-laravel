@extends("layouts.app")

@section("content")

    <body class="bg-gray-100">

        <div class="w-5/6 mx-auto mt-10">

            @if ($errors->any())
                <div class="bg-white p-5 mb-4">
                    <strong>ERROR:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="bg-white p-5" method="POST" action="{{ route('lessen.store') }}">

                @csrf

                <h2 class="text-xl font-bold mb-4">Les informatie</h2>

                <div class="mb-4">
                    <label for="abonnement_type_id">Abonnement:</label><br>

                    <select class="bg-gray-100 p-1" name="abonnement_type_id" id="abonnement_type_id" required>
                        <option value="">Kies een abonnement</option>

                        @foreach($abonnementTypes as $abonnementType)
                            <option value="{{ $abonnementType->id }}" {{('abonnement_type_id') == $abonnementType->id ? 'selected' : '' }}>
                                {{ $abonnementType->naam }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="naam">Naam van de les:</label><br>

                    <input class="bg-gray-100 p-1" type="text" name="naam" id="naam" value="{{('naam') }}" required>
                </div>

                <div class="mb-4">
                    <label for="onderwerp">Onderwerp:</label><br>

                    <input class="bg-gray-100 p-1" type="text" name="onderwerp" id="onderwerp" value="{{('onderwerp') }}" required>
                </div>

                <div class="mb-4">
                    <label for="beschrijving">Beschrijving:</label><br>

                    <textarea class="bg-gray-100 p-1" name="beschrijving" id="beschrijving" rows="5" required>{{('beschrijving') }}</textarea>
                </div>

                <h2 class="text-xl font-bold mb-4">Video</h2>

                <div class="mb-4">
                    <label for="video_naam">Naam van de video:</label><br>

                    <input class="bg-gray-100 p-1" type="text" name="video_naam" id="video_naam" value="{{('video_naam') }}" required>
                </div>

                <div class="mb-4">
                    <label for="video">YouTube iframe:</label><br>

                    <textarea class="bg-gray-100 p-1" name="video" id="video" rows="8" placeholder="Plak hier de volledige YouTube iframe..." required>{{('video') }}</textarea>
                </div>

                <button class="bg-gray-200 px-3 py-1" type="submit">
                    Les aanmaken
                </button>

            </form>

        </div>

    </body>

@endsection