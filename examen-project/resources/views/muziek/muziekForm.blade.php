@extends ("layouts.app")
@section("content")
<div class="flex justify-center">
    <form class="bg-gray-300 mt-10 w-5/6 rounded shadow flex flex-col pt-5 px-5"
    method="POST" action="{{ route('muziek.store') }}" enctype="multipart/form-data">
        @csrf
        <br>
        <div class="pt-5">
            <label for="naam">naam</label>
            <input class="bg-gray-100"type="text" id="naam" name="naam" value="" required>
        </div>
        <div class="pt-5">
            <label for="beschrijving">beschrijving</label>
            <input class="bg-gray-100" type="text" id="beschrijving" name="beschrijving" value="" required>
        </div>
        <div class="pt-5">
            <label for="bestand">bestand</label>
            <input class="" type="file" id="bestand" name="bestand" required>
        </div>
        <div class="pt-5">
            <label for="prijs">prijs</label>
            <input class="bg-gray-100" type="number" id="prijs" name="prijs" value="0.00" step="0.01" required>
        </div>
        <div class="pt-5">
            <label for="afbeelding">afbeelding</label>
            <input class="" type="file" id="afbeelding" name="afbeelding" required>
        </div>
        <br>
        <button class="bg-gray-100 mb-5 rounded" type="submit">Upload</button>
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