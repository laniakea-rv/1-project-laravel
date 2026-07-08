@extends ("layouts.app")
@section("content")
<div>
    <form method="POST" action="{{ route('muziek.store') }}" enctype="multipart/form-data">
        @csrf
        <br>
        <div>
            <label for="naam">naam</label>
            <input type="text" id="naam" name="naam" value="Lege naam" required>
        </div>
        <div>
            <label for="beschrijving">beschrijving</label>
            <input type="text" id="beschrijving" name="beschrijving" value="Lege beschrijving" required>
        </div>
        <div>
            <label for="bestand">bestand</label>
            <input type="file" id="bestand" name="bestand" required>
        </div>
        <div>
            <label for="prijs">prijs</label>
            <input type="number" id="prijs" name="prijs" value="0.00" step="0.01" required>
        </div>
        <div>
            <label for="afbeelding">afbeelding</label>
            <input type="file" id="afbeelding" name="afbeelding" required>
        </div>
        <br>
        <button type="submit">Upload</button>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
</div>
@endsection