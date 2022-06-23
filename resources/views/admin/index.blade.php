<x-admin-layout>

  <hr>
  <div class="py-1">
    {{ $tiket->links() }}
  </div>
  <table class="table-auto border bg-white border-gray-400 overflow-x-auto whitespace-nowrap block">
    <thead class="border-t border-b border-gray-400 bg-gray-300">

      <tr class="text-gray-700">
        <th class="py-2 font-semibold w-1/12">ID</th>
        <th class="py-2 font-semibold w-2/12">nama</th>
        <th class="py-2 font-semibold w-2/12">topik</th>
        <th class="py-2 font-semibold w-3/12">status</th>
        <th class="py-2 font-semibold w-3/12">Tanggal tiket dibuat</th>
        <th class="py-2 font-semibold w-1/12"></th>
        <th class="py-2 font-semibold w-1/12"></th>
      </tr>

    </thead>

    <tbody>

      @foreach ($tiket as $t)

      <tr class="">
        <td class="py-4 text-gray-800 px-2 text-center">{{ $t->id }}</td>
        <td class="py-4 text-gray-800 px-2 flex flex-col text-left">
          <div class="font-semibold">
            {{ $t->nama }}
          </div>
          <div class="text-sm">
            {{ $t->divisi }}
          </div>
        </td>
        <td class="py-4 text-gray-800 px-2 text-center">{{ $t->topik }}</td>

        <td class="py-4 text-gray-800 px-2 text-center">
          @if($t->status == 'Diterima')
          <span class="bg-green-500 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>

          @elseif($t->status == 'Diproses')
          <span class="bg-blue-600 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>

          @elseif($t->status == 'Dipinjam')
          <span class="bg-purple-600 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>

          @elseif($t->status == 'Selesai')
          <span class="bg-rose-500 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>
          @elseif($t->status == 'Ditutup')
          <span class="bg-orange-500 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>
          @endif

        </td>
        <td class="py-4 text-gray-800 px-2 text-center">{{ $t->created_at }}</td>
        <td class="py-4 text-gray-800 px-4 text-center">
          {{-- <a href="/ticket/{{ $t->id }}/detail" class="font-semibold">Detail</a> --}}
          <!-- Button trigger modal -->
          <button type="button" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $t->id }}">
            Detail
          </button>

          <!-- Modal -->
          <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
            id="exampleModal-{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModal-{{ $t->id }}-Label" aria-hidden="true">
            <div class="modal-dialog relative w-auto pointer-events-none">
              <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                  class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                  <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModal-{{ $t->id }}-Label">{{ $t->topik }}</h5>
                  <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    
                <div class="modal-body leading-[10px] whitespace-pre-wrap text-left relative flex-wrap wrap-word p-4">
                  <p>nama   : {{ $t->nama }}</p>
                  <p>divisi   : {{ $t->divisi }}</p>
                  <p>alat      : {{ $t->alat }}</p>

                  @if ($t->keterangan != '-')
                  <p class="font-bold">detail :</p>
                  <p>{{ $t->keterangan }}</p>
                  <hr class="mt-4">
                  @endif
                  {{-- Lampiran Gambar : --}}
                  @if($t->file != null)
                  <h3 class="mb-4 font-semibold">Lampiran Gambar : </h3>
                  <img width="300px" src="{{ url('/data_file/'.$t->file) }}">
                  @endif
                </div>

                <div
                  class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                  <button type="button"
                    class="px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </td>

        {{-- Ticket Edit & Delete --}}
        <td class="py-4 grid gap-y-1 text-gray-800 px-2 text-center" class="">

          <a href="/ticket/{{ $t->id }}/edit"
            class="text-white bg-green-500 hover:bg-green-400 p-[2px] rounded transition-colors duration-150">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>

          </a>


          <form action="/ticket/{{ $t->id }}" method="post">
            @csrf
            @method('delete')

            <button
              class="block text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded text-sm p-[2px] text-center"
              type="button" data-modal-toggle="popup-modal">
              <svg xmlns="http://www.w3.org/2500/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </button>

            <div id="popup-modal" tabindex="-1"
              class="hidden overflow-y-auto bg-black/50 overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
              aria-hidden="true">
              <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tiket ini akan dihapus</h3>
                    <button type="submit" data-modal-toggle="popup-modal" type="button"
                      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Iya
                    </button>
                    <button data-modal-toggle="popup-modal" type="button"
                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
        </td>

      </tr>

      @endforeach

    </tbody>
  </table>
</x-admin-layout>