<?php
use Carbon\Carbon;
?>
<x-admin-layout>
    <section class="p-1">
      <div class="text-center pb-4">
          <h1 class="text-3xl font-bold antialiased">Dashboard</h1>
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
        $terima = DB::table('tickets')->where('status', 'like', '%Diterima%')->count();
        $proses = DB::table('tickets')->where('status', 'like', '%Diproses%')->count();
        $pinjam = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->count();
        $selesai = DB::table('tickets')->where('status', 'like', '%Selesai%')->count();
        $tutup = DB::table('tickets')->where('status', 'like', '%Ditutup%')->count();

        // $timestamp = strtotime($new->created_at);
        // $month = date('m', $timestamp);

        $jan = DB::table('tickets')->whereMonth('created_at', '01')->count();
        $feb = DB::table('tickets')->whereMonth('created_at', '02')->count();
        $mar = DB::table('tickets')->whereMonth('created_at', '03')->count();
        $apr = DB::table('tickets')->whereMonth('created_at', '04')->count();
        $mei = DB::table('tickets')->whereMonth('created_at', '05')->count();
        $jun = DB::table('tickets')->whereMonth('created_at', '06')->count();
        $jul = DB::table('tickets')->whereMonth('created_at', '07')->count();
        $aug = DB::table('tickets')->whereMonth('created_at', '08')->count();
        $sep = DB::table('tickets')->whereMonth('created_at', '09')->count();
        $oct = DB::table('tickets')->whereMonth('created_at', '10')->count();
        $nov = DB::table('tickets')->whereMonth('created_at', '11')->count();
        $dec = DB::table('tickets')->whereMonth('created_at', '12')->count();
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
                    label: 'Proses',
                    data: [{{ $terima }},{{ $proses }}, {{ $pinjam }}, {{ $selesai }} ],
                    backgroundColor: [
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
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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
                labels: ['Diterima', 'Ditutup'],
                datasets: [{
                    label: 'Proses',
                    data: [{{ $terima }},{{ $tutup }} ],
                    backgroundColor: [

                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',

                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                    
                }
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
                    label: 'Proses',
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
      <span>{{ $hitung }} Tiket dibuat hari ini</span>
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