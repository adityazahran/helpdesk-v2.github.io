<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title>Admin - Helpdesk PT Tirta Asasta</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-between font-family-karla transition-all duration-200">
    <aside class="fixed bg-sidebar h-full min-h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <a href="/ticket/create"
                class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="/admin/dashboard"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-flush-heading-2">
                    <button type="button"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item justify-between w-full nav-item text-base font-semibold"
                        data-accordion-target="#accordion-flush-body-2">
                        <div class="text-white">
                            <i class="fas fa-table mr-3 "></i>
                            <span>Table</span>
                        </div>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-2">
                        <ul>
                            <li class="py-2 px-4">
                                <a href="/admin/" class="flex justify-between">
                                    <div class="">
                                        
                                        <span>Semua Tiket</span>
                                    </div>
                                    @if($semua > 0)
                                    <span
                                        class="text-white bg-slate-400 font-semibold text-xs px-2 py-[1px] flex items-center rounded-full">{{
                                        $semua }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="py-2 px-4">
                                <a href="/admin/diterima" class="flex justify-between">
                                    <div class="">
                                        
                                        <span>Diterima</span>
                                    </div>
                                    @if($terima > 0)
                                    <span
                                        class="text-white bg-red-500 font-semibold text-xs px-2 py-[1px] flex items-center rounded-full">{{
                                        $terima }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="py-2 px-4">
                                <a href="/admin/diproses" class="flex justify-between">
                                    <div class="">
                                        
                                        <span>Diproses</span>
                                    </div>
                                    @if($proses > 0)
                                    <span
                                        class="text-white bg-red-500 font-semibold text-xs px-2 py-[1px] flex items-center rounded-full">
                                        {{ $proses }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="py-2 px-4">
                                <a href="/admin/dipinjam" class="flex justify-between">
                                    <div class="">
                                        
                                        <span>Dipinjam</span>
                                    </div>
                                    @if($pinjam > 0)
                                    <span
                                        class="text-white bg-red-500 font-semibold text-xs px-2 py-[1px] flex items-center rounded-full">
                                        {{ $pinjam }}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="py-2 px-4">
                                <a href="/admin/selesai" class="flex justify-between">
                                    <div class="">
                                        
                                        <span>Selesai</span>
                                    </div>
                                    @if($selesai > 0)
                                    <span
                                        class="text-white bg-red-500 font-semibold text-xs px-2 py-[1px] flex items-center rounded-full">
                                        {{$selesai }}</span>
                                    @endif
                        </ul>
                    </div>
                </div>
            </div>
            <a href="/admin/ditutup" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Tiket Tutup
            </a>
            <a href="/register/" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Register new Admin
            </a>
            <a href="/ticket/export" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-file-export mr-3"></i>
                Export Ticket
            </a>

            <div class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="font-semibold text-base">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
        </nav>

    </aside>
    <hr>
    <div class="space-y-4 px-2 overflow-x-hidden overflow-y-hidden w-[80%] flex flex-col min-h-screen">
        {{ $slot }}
    </div>
    </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>


</body>

</html>