@extends ("layouts.app")
@section("content")

    <body>
        <div>
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif

            <form action="{{ route('workshop.update', $workshop->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="naam">naam</label>
                <input type="text" name="naam" id="naam" value="{{ $workshop->naam }}" required><br>
                <label for="beschrijving">beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" required>{{ $workshop->beschrijving }}</textarea><br>
                <label for="tijd">tijd</label>
                <input type="datetime-local" name="tijd" id="tijd" value="{{ $workshop->tijd }}" required><br>
                <label for="locatie">locatie</label>
                <input type="text" name="locatie" id="locatie" value="{{ $workshop->locatie }}" required><br>
                <label for="afbeelding">afbeelding</label>
                <input type="file" name="afbeelding" id="afbeelding" accept="image/*" required><br>
                <button type="submit">Bewerk workshop</button>
            </form>
        </div>
    </body>
@endsection