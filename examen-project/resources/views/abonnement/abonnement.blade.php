@extends ("layouts.app")
@section("content")
<body>
<div class="flex justify-center" >
  @foreach ($abonnement as $item)
  <div class="bg-gray-400 h-5/5 w-4/5 m-2 text-gray-50 text-4xl">
    <tr class="">
      <td>{{ $item->id }}</td>
      <td >{{ $item->naam }}</td>
        <td>{{ $item->beschrijving }}</td>
      <td>{{ $item->prijs }}</td>
      <td> <form action="{{ route('saveUserAbonnement')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <button type="submit">aanschaffen</button></form></td>
    </tr>
    </div>
    <br>
  @endforeach
</div>
</body>
@endsection