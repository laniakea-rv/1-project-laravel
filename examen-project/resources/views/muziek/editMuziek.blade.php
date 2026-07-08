<div>
    <form method="POST" action="{{ route('muziek.update', $muziek->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <br>
        <div>
            <label for="naam">naam</label>
            <input type="text" id="naam" name="naam" value="{{$muziek->naam}}" required>
        </div>
        <div>
            <label for="beschrijving">beschrijving</label>
            <input type="text" id="beschrijving" name="beschrijving" value="{{$muziek->beschrijving}}" required>
        </div>
        <div>
            <label for="bestand">bestand</label>
            @if($muziek->bestand)
                <div>
                    <small>bestand: {{ basename($muziek->bestand) }}</small>
                </div>
            @endif
            <input type="file" id="bestand" name="bestand">
        </div>
        <div>
            <label for="prijs">prijs</label>
            <input type="number" id="prijs" name="prijs" value="{{$muziek->prijs}}" step="0.01" required>
        </div>
        <div>
            <label for="afbeelding">afbeelding</label>
            @if($muziek->afbeelding)
                <div>
                    <img src="{{ asset('storage/' . $muziek->afbeelding) }}" alt="cover foto">
                </div>
            @endif
            <input type="file" id="afbeelding" name="afbeelding">
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