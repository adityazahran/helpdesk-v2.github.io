<nav class="p-2 z-10 relative shadow-md bg-gradient-to-r text-white from-blue-400  to-blue-600">
    <div class="container">
        <div class="p-1">
            <div class="md:hidden flex justify-between items-center">
                <h1 class="text-center text-xl font-semibold">Helpdesk Karyawan</h1>
                <button data-collapse-toggle="mobile-menu" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="hidden w-full md:flex justify-between md:w-auto" id="mobile-menu">
                <a href="{{ route('register') }}" class="cursor-default hidden md:block">
                    <img src="{{ asset('img/logo.png') }}" alt="Perusahaan PT Tirta Asasta" style="width: 66px">
                </a>
                <ul
                    class="block md:flex-row text-center md:flex mt-0 items-center ml-0 md:ml-32 gap-6 justify-center space-x-0 md:space-x-6">
                    @foreach ($navigations as $name => $url)
                    <li
                        class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                        <a href="{{ $url }}">{{ $name }}</a>
                    </li>
                    @endforeach
                    
                </ul>

                <ul
                    class="block md:flex-row text-center md:flex mt-0 items-center gap-0 md:gap-2 justify-center">
                @guest
                <li
                    class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                    <a href="{{ route('login') }}">Admin Login</a>
                </li>
                {{-- <li
                    class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                    <a href="{{ route('register') }}">Register</a>
                </li> --}}
                @endguest

                @auth
                <li
                    class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                    <div class="flex justify-center">
                        <a href="/admin">Admin Table</a>
                        @if($notif = DB::table('tickets')->where('status', 'like', '%Diterima%')->count())
                        <div class="text-xs -mt-2">
                            <div class="px-[6px] py-[1px] bg-red-500 rounded-full">
                                <span>{{ $notif }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </li>

                <li
                    class="block px-0 md:px-4 py-2 -ml-2 mt-2  bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="font-semibold">
                            Logout
                        </button>
                    </form>
                </li>
                @endauth
            </ul>

            </div>
            <div class="pt-2 
            @if(url()->current() == url('/ticket/search'))
                hidden
            @endif
            ">
                <form action="/ticket/search" method="get" class="w-full md:w-6/12 mt-2">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name="cari" id="default-search"
                            class="block p-3 pl-11   w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari Tiket anda disini..." required="">
                        <button type="submit"
                            class="text-white absolute right-2 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-3 py-[6px]">Search</button>
                    </div>
                </form>
            </div>
        </div>
</nav>
</div>