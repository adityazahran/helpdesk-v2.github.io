<x-app-layout>
    <div class="min-h-screen">
        <div class="container px-2">
            <section class="pt-14 block md:flex bg-heroes">
                <div class="w-full md:w-1/2 antialiased flex flex-col justify-center mt-12">

                    <div class="-mb-2">
                        <div id="default-carousel" class="md:relative md:block hidden" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                                <!-- Item 1 -->
                                <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
                                    data-carousel-item="">
                                    <span
                                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                                        Slide</span>
                                    <img src="\img\Kantor.jpeg"
                                        class="h-full bg-cover block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
                                    data-carousel-item="">
                                    <img src="\img\Timur.jpeg"
                                        class="h-full bg-cover block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10"
                                    data-carousel-item="">
                                    <img src="\img\Barat.jpeg"
                                        class="h-full bg-cover block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800"
                                    aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button"
                                    class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                                    aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button"
                                    class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                                    aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                data-carousel-prev="">
                                <span
                                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="hidden">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                                data-carousel-next="">
                                <span
                                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="hidden">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>

                    <h1
                        class="font-bold text-5xl mt-3 md:text-left text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">
                        PT Tirta Asasta
                    </h1>

                    <span
                        class="font-medium md:font-semibold text-2xl md:text-left text-center bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">
                        Selamat datang di Helpdesk Karyawan
                    </span>

                </div>

                <div class="w-full items-center -mt-16 md:w-1/2 gap-x-5 block md:flex px-4">
                    <a href="/ticket/create"
                        class="mt-20 border-2 space-y-6 text-center border-blue-500 bg-blue-500 hover:bg-blue-400 flex flex-col items-center transition-all duration-500  px-12 md:px-14 py-28 w-full md:w-1/2 rounded font-semibold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span class="text-2xl">Buat Tiket Baru</span>
                    </a>

                    <a href="/ticket/search"
                        class="mt-20 border-2 space-y-6 text-center border-blue-500 bg-blue-500 hover:bg-blue-400 flex flex-col items-center transition-all duration-500  px-12 md:px-14 py-28 w-full md:w-1/2 rounded font-semibold text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>

                        <span class="text-2xl">Cek Status Tiket</span>
                    </a>

                </div>
            </section>

            <div class="flex justify-end -mt-4 -mr-8 justify-items-end">
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
                    <h1 class="text-3xl font-bold">Status Pemrosesan Masalah</h1>
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