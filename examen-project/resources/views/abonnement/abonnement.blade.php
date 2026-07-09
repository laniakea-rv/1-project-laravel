@extends ("layouts.app")
@section("content")

  <body>
    <div>
      @if(session('error'))
        <p>{{ session('error') }}</p>
      @endif
      @foreach ($abonnementen as $item)
        <tr>
          <td>{{ $item->naam }}</td>
          <td>{{ $item->beschrijving }}</td>
          <td>{{ $item->prijs }}</td>
          <td>
            <form action="{{ route('saveUserAbonnement')}}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $item->id }}">
              <button type="submit">aanschaffen</button>
            </form>
          </td>
        </tr>
        <br>
      @endforeach
      @if($huidigAbonnement)
        <p>jouw abonnement nu is {{ $huidigAbonnement->abonnementtype->naam }}</p>
        <form action="{{ route('opzeggenUserAbonnement') }}" method="post">
          @method('PUT')
          @csrf
          <button type="submit">abonnement opzeggen</button>
        </form>
      @else
        <p>je hebt nog geen actief abonnement, laten we dat veranderen</p>
      @endif
    </div>
  </body>
@endsection