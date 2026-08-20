@extends ("layouts.app")
@section("content")

    <body>
        <div>
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif

            <form action="{{ route('workshop.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="naam">naam</label>
                <input type="text" name="naam" id="naam" required><br>
                <label for="beschrijving">beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" required></textarea><br>
                <label for="tijd">tijd</label>
                <input type="datetime-local" name="tijd" id="tijd" required><br>
                <label for="locatie">locatie</label>
                <input type="text" name="locatie" id="locatie" required><br>
                <label for="afbeelding">afbeelding</label>
                <input type="file" name="afbeelding" id="afbeelding" accept="image/*" required><br>
                <button type="submit">Maak workshop</button>
            </form>
        </div>
    </body>
@endsection