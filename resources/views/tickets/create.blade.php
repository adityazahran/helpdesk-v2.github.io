<x-app-layout title="Buat Tiket Baru">
    @if($errors->has('file'))
    <div class="flex p-2 text-white bg-red-500" role="alert">
        <div>
          <span class="font-semibold">File tidak sesuai format yang ditentukan</span>
        </div>
      </div>
      @elseif($errors->all())
      <div class="flex p-2 text-white bg-red-500" role="alert">
        <div>
          <span class="font-semibold">Form utama tidak boleh kosong</span>
        </div>
      </div>
    @endif
    
   

    <div class="container">

        <div class="text-center mt-10 `">
            <h3 class="font-bold text-3xl">Buat Tiket Baru</h3>
            <p class="text-lg font-medium">Isi Formulir detail masalah.</p>
        </div>

        <section class="py-4">
            <form action="/ticket/create" method="post"
                class="flex flex-col flex-1 px-4 w-full md:w-8/12 mx-auto font-semibold" enctype="multipart/form-data"  >

                @csrf
                <x-mainform></x-mainform>

                {{-- Text Area Detail --}}
                <div class="text-center my-4">
                    <h3 class="font-bold text-3xl">Detail Problem</h3>
                    <p class="text-lg font-medium">Jelaskan Secara Detail Isu Yang Ada. Kosongkan Jika Tidak Diperlukan
                    </p>
                </div>

                
                <textarea placeholder="Masukkan Detail masalah..." name="keterangan" id="" cols="25" rows="10" class="border-gray-400 border rounded-sm p-2"></textarea>
                <label class="block mt-4 mb-1 font-medium text-gray-900 dark:text-gray-300" for="file_input">Lampirkan Gambar : </label>
                <input name="file" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                <p class="mt-[0.75px] text-xs text-gray-400 dark:text-gray-300" id="file_input_help">Format file JPEG, PNG, JPG  |  Maksimal File:2MB</p>
                <button type="submit"
                    class="rounded mt-4 px-2 py-4 w-4/12 mx-auto bg-gradient-to-r from-blue-600 to-blue-400 text-white hover:from-blue-400 hover:to-blue-600 transition-all duration-500 font-semibold">
                    Kirimkan Tiket
                </button>
            </form>
        </section>
        
    </div>
</x-app-layout>