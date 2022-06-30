<?php
use Carbon\Carbon;
?>


<x-app-layout>
    @if(session()->has('warning'))
    <div id="alert-4" class="flex p-4 bg-yellow-100 dark:bg-yellow-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-yellow-700 dark:text-yellow-800" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 text-sm font-medium text-yellow-700 dark:text-yellow-800">
            {{ session()->get('warning') }} <a href="/admin/"
                class="font-semibold underline hover:text-yellow-800 dark:hover:text-yellow-900">Diproses</a>.
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-yellow-100 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-yellow-200 dark:text-yellow-600 dark:hover:bg-yellow-300"
            data-dismiss-target="#alert-4" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    @endif
    <div class="">
        <a href="/ticket/create">
            <section class="hidden md:block relative bg-[url('/img/Kantor.jpeg')] bg-cover bg-center pt-72 group">
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
    </div>
    <section class="block md:hidden h-[80vh] relative bg-[url('/img/Air.jpg')] bg-cover bg-center group">
        <div class="bg-black/60 w-full h-full transition-colors duration-75">
            <div class="container px-2">
                <div class="text-center pt-24 text-white leading-loose">
                    <h1
                        class=" text-4xl mb-16 font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-300">
                        Helpdesk Karyawan <br> <span class=""> PT Tirta Asasta</span></h1>

                    <a href="/ticket/create"
                        class="px-6 rounded py-4 bg-blue-600 border-2 border-blue-600 hover:border-blue-100 hover:bg-blue-500 transition-colors duration-200">Buat
                        Tiket Baru Anda Disini</a>


                </div>
            </div>
        </div>
    </section>

    <div class="flex flex-col justify-end absolute bottom-3 right-4 items-end w-3/12">
        @if(session()->has('success'))
        <div id="toast-success"
            class="flex items-center border  w-full max-w-xs p-4 mb-2 text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800"
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
        {{-- @if(session()->has('warning'))
        <div id="toast-success"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">{{ session()->get('warning') }}</div>
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
        @endif --}}
    </div>
    </div>


    <section class="pt-14 md:pb-16 pb-44">
        <div class="text-center">
            <h2
                class="text-3xl font-bold antialiased bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-300">
                Tiket Terbaru</h2>
            <p class="font-bold antialiased text-blue-600">Tiket yang baru dibuat, akan ditampilkan disini</p>
        </div>

        <div class="mt-8 w-11/12 md:w-9/12 mx-auto">
            <hr class="">
            @foreach($tiket as $t)
            <a class="cursor-pointer flex px-4 my-0 py-8 justify-between border-b border-gray-300 group"
                data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $t->id }}">
                <div class="">
                    <div class="">
                        <h2
                            class="text-blue-500  transition-colors duration-300 group-hover:text-blue-700 font-semibold text-base">
                            {{ $t->divisi }}</h2>
                        <h3 class="text-sm">{{ $t->topik }}</h3>
                    </div>
                </div>
                <div class="flex gap-x-2 pr-0 md:pr-10 items-center">
                    <div
                        class="p-1 group-hover:bg-blue-500 rounded-full transition-colors duration-300 text-blue-500 group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="font-semibold transition-colors duration-300 text-blue-500 group-hover:text-blue-600">
                            Tanggal Dibuat : </p>
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
            @endforeach
        </div>

    </section>

    <section class="pb-8 hidden md:block">
        <div class="container px-6">
            <div class="w-10/12  mx-auto px-8 py-10 bg-blue-200">
                <div class="mb-2 leading-loose">
                    <h1 class="text-3xl">Buat Tiket Anda</h1>
                    <p>Jika Anda mengalami masalah dengan aplikasi atau perangkat. Silahkan Laporkan masalah disini.</p>
                </div>
                <a href="/ticket/create"
                    class=" font-semibold text-white px-5 rounded py-2 bg-blue-600 border-2 border-blue-600 hover:border-blue-100 hover:bg-blue-500 transition-colors duration-200">
                    Buat Tiket
                </a>
            </div>
        </div>
    </section>

    <section class="pb-8 hidden md:block">
        <div class="container px-6">
            <div class="w-10/12  mx-auto px-8 py-10 pr-20 bg-blue-200 flex justify-between items-center flex-1">
                <h1 class="text-4xl">Sudah membuat tiket?</h1>
                <a href="/ticket/search"
                    class="font-semibold text-white px-12 rounded py-8 bg-blue-600 border-2 border-blue-600 hover:border-blue-100 hover:bg-blue-500 transition-colors duration-200">
                    Cek Status Tiket
                </a>
            </div>
        </div>
    </section>

</x-app-layout>