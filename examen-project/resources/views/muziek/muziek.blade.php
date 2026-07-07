<table>
  @foreach ($muziek as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->naam }}</td>
      <td>{{ $item->beschrijving }}</td>
      <td>{{ $item->prijs }}</td>
      @if($item->afbeelding)
        <td>
          <img src="{{ asset('storage/' . $item->afbeelding) }}">
        </td>
      @endif
      @if($item->bestand)
        <td>
          <audio controls>
            <source src="{{ asset('storage/' . $item->bestand) }}" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </td>
      @endif
      <td>hello word</td>
    </tr>
    <br>
  @endforeach
</table>