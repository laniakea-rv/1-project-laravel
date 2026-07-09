@extends ("layouts.app")
@section("content")
<body>
<div>
  @foreach ($abonnement as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->naam }}</td>
        <td>{{ $item->beschrijving }}</td>
      <td>{{ $item->prijs }}</td>
      <td> <form action="{{ route('saveUserAbonnement')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <button type="submit">aanschaffen</button></form></td>
    </tr>
    <br>
  @endforeach
</div>
</body>
@endsection