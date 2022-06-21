<x-app-layout title="Cek Status Tiket">
  <div class="container min-h-screen">

    <div class="text-center mt-20 md:mt-8 mb-4 md:px-0 px-4">
      <h3 class="font-bold text-3xl">Cek Status Tiket</h3>
      <p class="text-lg">Masukkan Nama atau Divisi Untuk Mengecek Status Tiket<a href="/ticket/"
          class="cursor-default">.</a></p>
    </div>

    <section class="md:py-12 w-full mx-auto  md:w-5/12 rounded py-16 px-4">

      <form action="/ticket/search" method="get" class="flex flex-1 flex-col justify-center space-y-2 md:space-y-4">

        <input type="text" name="cari" placeholder="Cari Tiket.."
          class="px-2 py-4 w-full md:w-8/12 mx-auto border border-gray-400">
        <input type="submit" value="cari"
          class="rounded px-2 py-4 w-full md:w-8/12 mx-auto bg-gradient-to-r from-blue-600 to-blue-400 text-white hover:from-blue-400 hover:to-blue-600 transition-all duration-500 font-semibold">

      </form>

    </section>
    <section class="py-6">
      <div class="container">
        <table class="table-auto border border-gray-400 overflow-x-auto whitespace-nowrap block">

          <thead class="border-t border-b border-gray-400 bg-gray-300">
            <tr class="text-gray-700">
              <th class="py-2 font-semibold w-1/12">NO</th>
              <th class="py-2 font-semibold w-1/12">ID Tiket</th>
              <th class="py-2 font-semibold w-3/12">nama</th>
              <th class="py-2 font-semibold w-2/12">topik</th>
              <th class="py-2 font-semibold w-2/12">status</th>
              <th class="py-2 font-semibold w-5/12">Tanggal tiket dibuat</th>
              <th class="py-2 font-semibold w-1/12"></th>

            </tr>
          </thead>

          <tbody>

            @foreach ($tickets as $index => $ticket)

            <tr class="">
              <td class="py-2 text-gray-800 px-2 text-center border-gray-500">{{ $index + 1 }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">{{ $ticket->id }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">{{ $ticket->nama }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">{{ $ticket->topik }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">{{ $ticket->status }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">{{ $ticket->created_at }}</td>
              <td class="py-2 border-l text-gray-800 px-2 text-center border-gray-500">
                <a href="/ticket/{{ $ticket->id }}/detail">Detail</a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </section>

    {{ $tickets->links() }}
  
  </div>
  </div>
</x-app-layout>