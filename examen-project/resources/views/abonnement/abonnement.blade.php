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
      <td><button>aanschaffen</button></td>
    </tr>
    <br>
  @endforeach
</div>
</body>
@endsection