@extends ("layouts.app")
@section("content")

  <body class="">
    <div class='bg-gray-300 text-black mt-10 w-6/7 rounded shadow pt-3 '>
      @if(session('error'))
        <p>{{ session('error') }}</p>
      @endif
      @foreach ($abonnementen as $item)
      <div class=" bg-gray-100 mt-3 w-5/6 rounded shadow ">
        <tr >
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
      </div>
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