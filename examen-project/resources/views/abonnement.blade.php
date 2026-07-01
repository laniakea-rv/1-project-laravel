<div>
  @foreach ($abonnement as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->naam }}</td>
        <td>{{ $item->beschrijving }}</td>
      <td>{{ $item->prijs }}</td>
      <td>hello word</td>
    </tr>
    <br>
  @endforeach
</div>