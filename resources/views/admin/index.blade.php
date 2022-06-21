<x-admin-layout>

  <hr>
  <div class="flex justify-between items-center">
    <span>{{ $hitung }} Ticket</span>
    <span>{{ $tiket->links() }}</span>
  </div>
  <hr>
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

          @elseif($t->status == 'Diproses')
          <span class="bg-blue-600 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>

          @elseif($t->status == 'Dipinjam')
          <span class="bg-purple-600 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>

          @elseif($t->status == 'Selesai')
          <span class="bg-gray-700 p-1 text-white text-[15px] font-semibold rounded-2xl">{{ $t->status }}</span>
          @endif

        </td>
        <td class="py-4 text-gray-800 px-2 text-center">{{ $t->created_at }}</td>
        <td class="py-4 text-gray-800 px-4 text-center">
          <a href="/ticket/{{ $t->id }}/detail" class="font-semibold">Detail</a>
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

            <button role="button" type="submit"
              class="text-white bg-red-500 hover:bg-red-400 p-[2px] rounded transition-colors duration-150">

              <svg xmlns="http://www.w3.org/2500/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>

            </button>

        </td>

      </tr>

      @endforeach

    </tbody>
  </table>
</x-admin-layout>