@extends ("layouts.app")
@section("content")

  <body>
    <div class="flex justify-center ">
      <table class='bg-gray-300 text-black px-6 py-3 rounded shadow w-4/7  mt-10'>
        <tr class="border-collapse border border-gray-500 ">
          <th>Naam</th>
          <th>Email</th>
          <th>Abonnement</th>
          <th>Start</th>
          <th>Einde</th>
        </tr>

        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>

          @if($huidigAbonnement)
              <td>
                <a href="{{ route('abonnementen') }}">
                  {{ $huidigAbonnement->abonnementtype->naam }}
                </a>
              </td>

              <td>{{ $huidigAbonnement->start_datum }}</td>
              <td>{{ $huidigAbonnement->eind_datum }}</td>
            </tr>
          @else
          <p>geen actief abonnement</p>
        @endif
      </table>
      <a href="{{ route('user.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Pas details aan
      </a>
    </div>
  </body>
@endsection