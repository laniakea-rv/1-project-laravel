@extends ("layouts.app")
@section("content")

  <div class="grid grid-cols-6 gap-4">
    @foreach ($muziek as $item)
      <div class="bg-gray-50 shadow-lg flex flex-col items-center rounded p-2" data-id="{{ $item->id }}">
        @if($item->afbeelding)
          <div>
            <img src="{{ asset('storage/' . $item->afbeelding) }}"
              onerror="this.onerror=null; this.src='{{ asset('storage/default.png') }}';" class="w-32 h-32 object-cover">
          </div>
        @endif
        <h1 class="text-xl my-2">
          {{ $item->naam }}
        </h1>
        <p class="text-sm text-center">
          {{ $item->beschrijving }}
        </p>
        <span class="my-2">
          €{{ $item->prijs }}
        </span>
        @if($item->bestand)
          <div>
            <audio controls class="w-40" controls controlsList="nodownload noplaybackrate">
              <source src="{{ asset('storage/' . $item->bestand) }}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </div>
        @endif
        <div class="bg-green-600 text-white my-2 px-3 py-1">
          <a href="{{ asset('storage/' . $item->bestand) }}" download>
            Kopen
          </a>
        </div>
        <div>
          <a href="{{ route('muziek.edit', $item) }}">
            edit
          </a>
        </div>
      </div>
    @endforeach
  </div>
@endsection