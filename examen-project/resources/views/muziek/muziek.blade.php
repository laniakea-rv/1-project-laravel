@extends ("layouts.app")
@section("content")
<table>
  @foreach ($muziek as $item)
    <tr>
    <tr data-id="{{ $item->id }}">
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
      <td><a href=""{{ asset('storage/' . $item->bestand) }}"" download class="btn btn-primary">
        Koop
      </a></td>
      <td><a  href="{{ route('muziek.edit', $item) }}" >
        edit
      </a></td>
    </tr>
    <br>
  @endforeach
</table>
@endsection