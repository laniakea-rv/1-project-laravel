@extends("layouts.app")

@section("content")
  <table>
    <tr>
      <th>ID</th>
      <th>Naam</th>
      <th>Email</th>
      <th>Abonnement</th>
      <th>Start</th>
      <th>Einde</th>
    </tr>

    @foreach($users as $user)

      @php
        $huidigAbonnement = $user->abonnementen->where('actief', 1)->first();
      @endphp

      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>

        @if($huidigAbonnement)
          <td>{{ $huidigAbonnement->abonnementtype->naam }}</td>
        @else
          <td>Geen huidig abonnement</td>
        @endif

        @if($huidigAbonnement)
          <td>{{ $huidigAbonnement->start_datum }}</td>
          <td>{{ $huidigAbonnement->eind_datum }}</td>
        @else
          <td>-</td>
          <td>-</td>
        @endif
      </tr>

    @endforeach

  </table>
@endsection
