@extends ("layouts.app")
@section("content")
  <table class="flex justify-center flex-row">
    @foreach ($muziek as $item)
    <div class="flex flex-r">
      <tr class="flex flex-col justify-center">
      <tr class="bg-gray-50 shadow-lg h-2/6 w-7/5 flex flex-col items-center rounded" data-id="{{ $item->id }}">
        <td class="text-3xl my-5">{{ $item->naam }}</td>
        <td>{{ $item->beschrijving }}</td>
        
        @if($item->afbeelding)
          <td>
            <img  class="w-100 "src="{{ asset('storage/' . $item->afbeelding) }}">
          </td>
        @endif
        <td>€{{ $item->prijs }}</td>
        @if($item->bestand)
          <td>
            <audio controls>
              <source src="{{ asset('storage/' . $item->bestand) }}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </td>
        @endif
        <td class="bg-green-600 text-white w-4/8 text-xl my-5 flex justify-center"><a href="{{ asset('storage/' . $item->bestand) }}" download class="btn btn-primary">
            Kopen
          </a></td>
        <td><a href="{{ route('muziek.edit', $item) }}">
            edit
          </a></td>
      </tr>
      
    </div>
    @endforeach
  </table>
@endsection