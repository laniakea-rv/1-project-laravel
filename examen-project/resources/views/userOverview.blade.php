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
        $abonnement = $user->abonnementen->where('actief',  1)->first();
      @endphp
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        @if($abonnement)
          <td>{{ $abonnement->naam }}</td>
          <td>{{ $abonnement->start_datum }}</td>
          <td>{{ $abonnement->eind_datum }}</td>
        @else
          <td>Geen abonnement</td>
          <td>-</td>
          <td>-</td>
        @endif
      </tr>

    @endforeach

  </table>

@endsection