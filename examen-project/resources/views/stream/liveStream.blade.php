@extends("layouts.app")
@section("content")
  <div class="w-10/12 max-w-5xl mx-auto mt-8">
    <h2 class="mb-4 text-2xl font-semibold text-gray-900">
      livechat titel
    </h2>
    <div class="bg-gray-200 border border-[#838181] rounded-lg p-3">
      <div class="grid grid-cols-[1fr_280px] bg-white border border-[#838181] rounded-md overflow-hidden">
        <div>
          <div class="aspect-video bg-black">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/1EiC9bvVGnk?autoplay=1" frameborder="0"
              allowfullscreen>
            </iframe>
          </div>
          <div class="flex justify-between items-center p-4 border-t border-[#838181] bg-gray-50">
            <div>
              <h2 class="text-lg font-semibold text-gray-900">
                titel stream
              </h2>
              <p class="text-base text-gray-600 mt-1">
                beschrijving
              </p>
            </div>
            <div class="text-right text-base text-gray-600">
              <p>viewers: 9</p>
              <p>live sinds: 2 uur geleden</p>
            </div>
          </div>
        </div>
        <div class="flex flex-col border-l border-[#838181]">
          <h2 class="p-4 text-center text-lg font-semibold border-b border-[#838181] bg-gray-50">
            chat
          </h2>
          <div id="chat" class="flex-1 min-h-75 p-4 overflow-y-auto">
          </div>
          <div id="messagebox" class="h-10 border-t border-[#838181]">
          </div>
        </div>
      </div>
    </div>
    <button id="inschrijfknop" type="button"
      class="mt-4 px-5 py-2.5 bg-gray-800 text-white font-medium rounded-md border border-gray-900 hover:bg-gray-700 active:bg-gray-900 transition-colors duration-150 disabled:bg-gray-400 disabled:border-gray-400 disabled:cursor-default">
      <span>inschrijven</span>
    </button>
  </div>
  <script>
    const button = document.getElementById("inschrijfknop");
    button.addEventListener("click", function () {
      button.disabled = true;
      button.innerHTML = "<span>ingeschreven</span>";
    });
  </script>
@endsection