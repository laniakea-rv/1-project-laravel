@extends("layouts.app")

@section("content")

    <h1>Les aanmaken</h1>

    @if ($errors->any())
        <div>
            <strong>ERROR:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('lessen.store') }}">

        @csrf

        <h2>Les informatie</h2>

        <div>
            <label for="abonnement_type_id">
                Abonnement:
            </label>

            <select name="abonnement_type_id" id="abonnement_type_id" required>
                <option value="">Kies een abonnement</option>

                @foreach($abonnementTypes as $abonnementType)
                    <option value="{{ $abonnementType->id }}" {{('abonnement_type_id') == $abonnementType->id ? 'selected' : '' }}>
                        {{ $abonnementType->naam }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label for="naam">
                Naam van de les:
            </label>

            <input type="text" name="naam" id="naam" value="{{('naam') }}" required>
        </div>

        <br>

        <div>
            <label for="onderwerp">
                Onderwerp:
            </label>

            <input type="text" name="onderwerp" id="onderwerp" value="{{('onderwerp') }}" required>
        </div>

        <br>

        <div>
            <label for="beschrijving">
                Beschrijving:
            </label>

            <textarea name="beschrijving" id="beschrijving" rows="5" required>{{('beschrijving') }}</textarea>
        </div>

        <h2>Video</h2>

        <div>
            <label for="video_naam">
                Naam van de video:
            </label>

            <input type="text" name="video_naam" id="video_naam" value="{{('video_naam') }}" required>
        </div>

        <br>

        <div>
            <label for="video">
                YouTube iframe:
            </label>

            <textarea name="video" id="video" rows="8" placeholder="Plak hier de volledige YouTube iframe..."
                required>{{('video') }}</textarea>
        </div>

        <br>

        <button type="submit">
            Les aanmaken
        </button>

    </form>

@endsection