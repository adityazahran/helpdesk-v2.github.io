<?php
use Carbon\Carbon;
?>
<x-admin-layout>
  <section class="p-1">
    <div class=" pb-4">
      <h1 class="text-3xl font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-200">Dashboard Admin</h1>
    </div>
    <div class="w-11/12 rounded-lg flex flex-col space-y-2 mx-auto">
      <div class="flex gap-x-1">
        <div class="w-8/12 bg-white border border-gray-400 shadow-xl mx-auto p-11 rounded">
          <canvas id="myChart" height="20vh" width="50vw"></canvas>
        </div>
        <div class="w-4/12 bg-white border border-gray-400 shadow-xl mx-auto p-11 rounded">
          <canvas id="chartTutup" height="20vh" width="50vw"></canvas>
        </div>
      </div>
      <div class="w-full bg-white border border-gray-400 shadow-xl mx-auto p-12 rounded">
        <canvas id="chartTahun" height="15vh" width="50vw"></canvas>
      </div>
    </div>
    {{-- Count Pemrosesan --}}
    <?php 
        $terima = DB::table('tickets')->where('status', 'like', '%Diterima%')->whereYear('created_at', date('Y'))->count();
        $proses = DB::table('tickets')->where('status', 'like', '%Diproses%')->whereYear('created_at', date('Y'))->count();
        $pinjam = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->whereYear('created_at', date('Y'))->count();
        $selesai = DB::table('tickets')->where('status', 'like', '%Selesai%')->whereYear('created_at', date('Y'))->count();
        $semua = DB::table('tickets')->where('status', '!=', 'Ditutup')->whereYear('created_at', date('Y'))->count();
        $tutup = DB::table('tickets')->where('status', 'like', '%Ditutup%')->whereYear('created_at', date('Y'))->count();

        // $timestamp = strtotime($new->created_at);
        // $month = date('m', $timestamp);

        $jan = DB::table('tickets')->whereMonth('created_at', '01')->whereYear('created_at', date('Y'))->count();
        $feb = DB::table('tickets')->whereMonth('created_at', '02')->whereYear('created_at', date('Y'))->count();
        $mar = DB::table('tickets')->whereMonth('created_at', '03')->whereYear('created_at', date('Y'))->count();
        $apr = DB::table('tickets')->whereMonth('created_at', '04')->whereYear('created_at', date('Y'))->count();
        $mei = DB::table('tickets')->whereMonth('created_at', '05')->whereYear('created_at', date('Y'))->count();
        $jun = DB::table('tickets')->whereMonth('created_at', '06')->whereYear('created_at', date('Y'))->count();
        $jul = DB::table('tickets')->whereMonth('created_at', '07')->whereYear('created_at', date('Y'))->count();
        $aug = DB::table('tickets')->whereMonth('created_at', '08')->whereYear('created_at', date('Y'))->count();
        $sep = DB::table('tickets')->whereMonth('created_at', '09')->whereYear('created_at', date('Y'))->count();
        $oct = DB::table('tickets')->whereMonth('created_at', '10')->whereYear('created_at', date('Y'))->count();
        $nov = DB::table('tickets')->whereMonth('created_at', '11')->whereYear('created_at', date('Y'))->count();
        $dec = DB::table('tickets')->whereMonth('created_at', '12')->whereYear('created_at', date('Y'))->count();
      ?>

    <script>
      {
        // Chart Pemrosesan
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Diterima', 'Diproses', 'Dipinjam', 'Selesai'],
                datasets: [{
                    label: 'Tiket',
                    data: [{{ $terima }},{{ $proses }}, {{ $pinjam }}, {{ $selesai }} ],
                    backgroundColor: [
                      'rgba(14, 159, 110, 0.8)',
                      'rgba(28, 100, 242, 0.8)',
                      'rgba(126, 58, 242, 0.8)',
                        'rgba(244, 63, 94, 0.8)',
                    ],
                    borderColor: [
                      'rgba(75, 192, 192, 0.8)',
                      'rgba(28, 100, 242, 0.8)',
                        'rgba(126, 58, 242, 0.8)',
                        'rgba(244, 63, 94, 0.8)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
              plugins: {
                  title: {
                      display: true,
                      text: 'Status Pemrosesan Tiket Tahun {{ date('Y') }}',
                      align :  'start',
                      color : '#4f4f4f',
                  }
              },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                    
                }
            }
        });
    }

    {
        // Chart Pemrosesan
        const ctx = document.getElementById('chartTutup').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tiket Masuk', 'Ditutup'],
                datasets: [{
                    label: 'Tiket',
                    data: [{{ $semua }},{{ $tutup }} ],
                    backgroundColor: [

                        'rgba(22, 189, 86, 0.9)',
                        'rgba(255, 159, 64, 0.9)',

                    ],
                    borderColor: [
                        'rgba(22, 189, 86, 0.9)',
                        'rgba(255, 159, 64, 0.9)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                  title: {
                      display: true,
                      text: 'Total Tiket',
                      align :  'start',
                      color : '#4f4f4f',
                  }
              },
            }
        });
    }


        // MonthlyChart
        {
        const monthly = document.getElementById('chartTahun').getContext('2d');
        const myChart = new Chart(monthly, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Tiket',
                    data: [{{ $jan }},{{ $feb }}, {{ $mar }}, {{ $apr }}, {{ $mei }}, {{ $jun }}, {{ $jul }}, {{ $aug }}, {{ $sep }}, {{ $oct }}, {{ $nov }}, {{ $dec }} ],
                    backgroundColor: [
                      'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
              plugins: {
                  title: {
                      display: true,
                      text: 'Grafik Tiket Masuk Tahun {{ date('Y') }}',
                      align :  'start',
                      color : '#4f4f4f',
                  }
              },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    </script>
  </section>
  <hr>
  <div class="flex justify-between items-center">
    @if($hitung > 0)
    <span>{{ $hitung }} Tiket dibuat hari ini</span>
    <span>{{ $tiket->links() }}</span>
  </div>
  <hr>
  <table class="table-auto border bg-white border-gray-400 overflow-x-auto whitespace-nowrap block mb-4">
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
                  <div class="-mt-1 tracking-wide leading">
                      <p class="font-semibold">detail :</p>
                      @if ($t->keterangan = '-')
                      <p>Pengisi tiket tidak memberikan keterangan lanjut.</p>
                      @else
                      <p>{{ $t->keterangan }}</p>
                      @endif
                  </div>
                  @if($t->file != null)
                  <h3 class="mb-4 font-semibold">Lampiran Gambar : </h3>
                  <img width="300px" src="{{ url('/data_file/'.$t->file) }}">
                  @endif

                  @auth  
                  @if($t->updated_at != $t->created_at)
                  <div class="absolute -bottom-10 left-2">
                    <p class="text-sm text-left">Diedit tanggal : {{ $t->updated_at }}</p>
                  </div>
                  @endif
                  @endauth
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
              type="button" data-modal-toggle="popup-modal-{{ $t->id }}">
              <svg xmlns="http://www.w3.org/2500/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </button>

            <div id="popup-modal-{{ $t->id }}" tabindex="-1"
              class="hidden overflow-y-auto bg-black/50 overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center"
              aria-hidden="true">
              <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal-{{ $t->id }}">
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
                    <button type="submit" data-modal-toggle="popup-modal-{{ $t->id }}" type="button"
                      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Iya
                    </button>
                    <button data-modal-toggle="popup-modal-{{ $t->id }}" type="button"
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
  @endif
</x-admin-layout>