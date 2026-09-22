@extends ("layouts.app")
@section("content")

    <body class="">
        <div class="w-5/6 mx-auto mt-10">

            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif

            <form class="bg-white p-5" action="{{ route('workshop.update', $workshop->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="naam">naam</label><br>
                    <input class="bg-gray-100 p-1" type="text" name="naam" id="naam" value="{{ $workshop->naam }}" required>
                </div>

                <div class="mb-4">
                    <label for="beschrijving">beschrijving</label><br>
                    <textarea class="bg-gray-100 p-1" name="beschrijving" id="beschrijving"
                        required>{{ $workshop->beschrijving }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="tijd">tijd</label><br>
                    <input class="bg-gray-100 p-1" type="datetime-local" name="tijd" id="tijd" value="{{ $workshop->tijd }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="locatie">locatie</label><br>
                    <input class="bg-gray-100 p-1" type="text" name="locatie" id="locatie" value="{{ $workshop->locatie }}"
                        required>
                </div>

                <div class="mb-4">
                    <label for="afbeelding">afbeelding</label><br>
                    <input type="file" name="afbeelding" id="afbeelding" accept=".jpg,.jpeg,.png" required>
                </div>

                <button class="bg-gray-200 px-3 py-1" type="submit">
                    Bewerk workshop
                </button>
            </form>

            <script>
                document.getElementById('afbeelding').addEventListener('change', function () {
                    const maxSize = 20 * 1024 * 1024;

                    if (this.files[0] && this.files[0].size > maxSize) {
                        alert('De afbeelding mag maximaal 20 MB groot zijn.');
                        this.value = '';
                    }
                });
            </script>

        </div>
    </body>
@endsection