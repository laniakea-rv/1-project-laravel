@extends ("layouts.app")
@section("content")
<body>
    <form action="{{ route('saveAbonnement') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="naam">naam</label>
        <input type="text" name="naam" class="abonnement-control">

        <label for="beschrijving">beschrijving</label>
        <input type="text" name="beschrijving" class="abonnement-control">

        <label for="prijs">prijs</label>
        <input type="number" name="prijs" class="abonnement-control">

        <button type="submit" class="btn btn-primary">abonnement opslaan</button>

    </form>
</body>
@endsection