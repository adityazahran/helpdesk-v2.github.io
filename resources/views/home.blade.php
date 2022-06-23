<?php
use Carbon\Carbon;
?>


<x-app-layout>
    <div class="min-h-screen">
        <a href="/ticket/create">
            <section class="hidden md:block relative bg-[url('/img/Kantor.jpeg')] bg-cover bg-center pt-64 group">
                    <div class="bg-black/60 py-3 bottom-0 w-full group-hover:bg-black/80 transition-colors duration-75">
                        <div class="container px-8">
                            <div class="text-right text-white leading-loose">
                                <h1 class="font-medium text-5xl">Helpdesk Karyawan PT Tirta Asasta</h1>
                                <span>Buat Tiket Baru Anda Disini </span>
                        </div>
                    </div>
                </div>
            </section>
        </a>
            <section class="block md:hidden h-[80vh] relative bg-[url('/img/Air.jpg')] bg-cover bg-center group">
                <div class="bg-black/60 w-full h-full transition-colors duration-75">
                    <div class="container px-2">
                        <div class="text-center pt-24 text-white leading-loose">
                            <h1 class=" text-4xl mb-16 font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-300">Helpdesk Karyawan <br> <span class=""> PT Tirta Asasta</span></h1>
                            
                            <a href="" class="px-6 rounded py-4 bg-blue-600 border-2 border-blue-600 hover:border-blue-100 hover:bg-blue-500 transition-colors duration-200">Buat Tiket Baru Anda Disini</a>


                    </div>
                </div>
            </div>
        </section>

        <section class="pt-16 md:pb-16 pb-44">
            <div class="text-center">
                <h2 class="text-3xl font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-300">Tiket Terbaru</h2>
                <p class="font-bold antialiased text-blue-600">Tiket yang baru dibuat, akan ditampilkan disini</p>
            </div>

            <div class="mt-8 w-11/12 md:w-9/12 mx-auto">

                <div class="mb-2 md:mb-0">{{ $tiket->links() }}</div>
                <hr class="">
                @foreach($tiket as $t)
                    <a class="cursor-pointer flex px-4 my-0 py-8 justify-between border-b border-gray-300"  data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $t->id }}">
                        <div class="">
                            <div class="">
                                <h2 class="text-blue-500 font-semibold text-base">{{ $t->divisi }}</h2>
                                <h3 class="text-sm">{{ $t->topik }}</h3>
                            </div>
                        </div>
                        <div class="flex gap-x-2 pr-0 md:pr-10 items-center">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                  </svg>
                            </div>
                            <div class="">
                                <p class="font-semibold text-blue-500">Tanggal Dibuat : </p>
                                <p class="text-sm">{{ $t->created_at->format('d M Y') }}</p>
                            </div>
                            
                        </div>
                    </a>
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
                @endforeach
            </div>
            
        </section>

        <div class="container px-2">
            <div class="flex justify-end -mt-28 -mr-8 justify-items-end">
                @if(session()->has('success'))
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 border border-gray-300 text-gray-500 bg-white rounded-lg shadow-2xl dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{ session()->get('success') }}</div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                @endif
            </div>

            <section class="py-20 hidden md:block">
                <div class="text-center pb-6">
                    <h1 class="text-3xl font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-300"">Status Pemrosesan Masalah</h1>
                </div>
                <div class="w-11/12 p-16 border-4 border-gray-600 rounded-lg mx-auto">
                    <div class="w-9/12 mx-auto">
                        <canvas id="myChart" height="30vh" width="80vw"></canvas>
                    </div>
                </div>
                {{-- Count Pemrosesan --}}
                <?php 
                  $terima = DB::table('tickets')->where('status', 'like', '%Diterima%')->count();
                  $proses = DB::table('tickets')->where('status', 'like', '%Diproses%')->count();
                  $pinjam = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->count();
                  $selesai = DB::table('tickets')->where('status', 'like', '%Selesai%')->count();
                ?>

                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                  const myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: ['Diterima', 'Diroses', 'Dipinjam', 'Selesai'],
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
                </script>
            </section>

        </div>
    </div>
</x-app-layout>