<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>muziek</title>
</head>
<body>
<div>
  @foreach ($muziek as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->naam }}</td>
        <td>{{ $item->beschrijving }}</td>
      <td>{{ $item->prijs }}</td>        
        @if($item->image)
        <td>
          <img src="{{ asset($item->image) }}">
        </td>
      @endif

      <td>hello word</td>
    </tr>
    <br>
  @endforeach
</div>
</body>