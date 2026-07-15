@extends ("layouts.app")
@section("content")
<body>
<div>
    <tr>
      <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
         </tr>
@if($huidigAbonnement)
        <td>{{ $huidigAbonnement->abonnementtype->naam}}</td>
        <td>{{ $huidigAbonnement->start_datum }}</td>
        <td>{{ $huidigAbonnement->eind_datum }}</td>
   @else
   <p>geen actief abonnement</p>
  @endif
</div>
</body>
@endsection

