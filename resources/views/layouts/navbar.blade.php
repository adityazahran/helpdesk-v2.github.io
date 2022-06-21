<nav class="p-2 z-10 relative shadow-md bg-gradient-to-r text-white from-blue-400  to-blue-600">
    <div class="container">
        <div class="p-2">
            <a href="{{ route('register') }}" class="cursor-default hidden md:block">
                <img src="{{ asset('img/logo.png') }}" alt="Perusahaan PT Tirta Asasta" style="width: 76px">
            </a>

            <div class="md:hidden flex justify-between items-center">
                <h1 class="text-center text-xl font-semibold">Helpdesk Karyawan</h1>
                <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg md:hidden hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
            </div>

            <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                <ul class="block md:flex-row text-center md:flex mt-0 items-center gap-6 ml-6 justify-center space-x-0 md:space-x-6 md:-mt-11">
                    @foreach ($navigations as $name => $url)
                    <li
                        class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                        <a href="{{ $url }}">{{ $name }}</a>
                    </li>
                    @endforeach
                    @guest
                    <li
                        class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
                        <a href="{{ route('login') }}">Admin Login</a>
                    </li>
                    @endguest
                    
                    @auth
                    <li class="block px-0 md:px-4 py-2 mt-2 font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
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
                
                    <li class="block px-0 md:px-4 py-2 mt-2  bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline transition-all duration-200">
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

        </div>
</nav>
</div>

