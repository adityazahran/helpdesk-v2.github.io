<x-app-layout title="Detail">

    <div class="min-h-screen">
        <div class="container px-40 mt-12">

            <h1 class="text-5xl font-bold mb-8">{{ $detail->topik }}</h1>
            <div class="flex flex-row-reverse justify-between">
                <div class="w-4/12">
                    <div class="px-6 pt-8 pb-12 shadow-xl border border-gray-200 rounded space-y-4">
                        <h2 class="font-semibold mb-2">Rincian Pengisi</h2>
                        <div class="text-base">
                            <div class="flex gap-x-3">
                                <div class="space-y-2">
                                    <h3 class="text-gray-600">Pengisi </h3>
                                    <h3 class="text-gray-600">Divisi </h3>
                                    <h3 class="text-gray-600">Alat </h3>
                                </div>

                                <div class="space-y-2">
                                    <h3 class="text-gray-600">:</h3>
                                    <h3 class="text-gray-600">:</h3>
                                    <h3 class="text-gray-600">:</h3>
                                </div>

                                <div class="space-y-2">
                                    <h3 class="text-black pl-6">{{ $detail->nama }}</h3>
                                    <h3 class="text-black pl-6">{{ $detail->divisi }}</h3>
                                    <h3 class="text-black pl-6">{{ $detail->alat }}</h3>
                                </div>
                            </div>
                        </div>

                        <button onclick="history.back()"
                            class="flex text-sm text-blue-600 font-semibold items-center justify-end hover:text-blue-500 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 hover:w-8 block transition-all duration-200 pr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                            Kembali
                        </button>
                        @auth
                            <div class="flex justify-around">
                                <a href="/ticket/{{ $detail->id }}/edit" class="hover:text-green-500 transition-colors duration-100">Edit</a>
                                <form action="/ticket/{{ $detail->id }}" method="post">
                                    @csrf
                                    @method('delete')
                    
                                    <button role="button" type="submit"
                                      class="w-4 h-4 mr-4 ml-5 hover:text-red-500 transition-colors duration-100">
                                      Delete
                                    </button>
                            </div>
                        @endauth
                    </div>
                </div>
                
                <div class="w-8/12 pr-6">
                    <p class="min-h-[300px] w-11/12 mt-2 leading-relaxed">
                        <span class="font-semibold antialiased mb-2">Keterangan :</span>
                        <br>
                        {{ $detail->keterangan }}
                    </p>
                    <hr class="my-2 border">
                    <div class="pt-8 pb-16">
                        {{-- Lampiran Gambar : --}}
                        @if($detail->file != null)
                        <h3 class="mb-4 font-semibold">Lampiran Gambar : </h3>
                        <img width="300px" src="{{ url('/data_file/'.$detail->file) }}">
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>