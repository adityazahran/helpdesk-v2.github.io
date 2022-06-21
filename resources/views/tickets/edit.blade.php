<x-admin-layout>
    <div class="container">
        <div class="text-center mt-8 mb-12">
            <h3 class="font-bold text-3xl">Edit Tiket</h3>
        </div>
        <form action="/ticket/{{ $edit ->id }}" method="post" class="flex flex-col flex-1 w-8/12 mx-auto font-semibold">
            @method('put')
            @csrf
             <x-mainform></x-mainform>
            <h3 class="text-center">Status Tiket</h3>
            <select name="status" id="" class="rounded w-1/2 mx-auto px-2 py-4">
                <option value="" hidden>status pengerjaan</option>
                <option <?php  if($edit->status == "Diterima"){echo "selected='selected'";} ?> value="Diterima">Diterima</option>
                <option <?php  if($edit->status == "Diproses"){echo "selected='selected'";} ?> value="Diproses">Diproses</option>
                <option <?php  if($edit->status == "Dipinjam"){echo "selected='selected'";} ?> value="Dipinjam">Dipinjam</option>
                <option <?php  if($edit->status == "Selesai"){echo "selected='selected'";} ?> value="Selesai">Selesai</option>
                <option <?php  if($edit->status == "Ditutup"){echo "selected='selected'";} ?> value="Ditutup">Ditutup</option>
            </select>
            <div class="text-center my-4">
                <h3 class="font-bold text-3xl">Detail Pesan</h3>
            </div>
            <textarea name="keterangan" id="" class="border-gray-400 border rounded-sm p-2" cols="25" rows="10">{{ $edit->keterangan }}</textarea>
            <button type="submit" class="rounded px-2 py-4 bg-gray-500 text-white hover:bg-white border-2 border-gray-500 hover:text-black transition-all duration-200">Edit Tiket</button>
        </form>
    </div>
</x-app-layout>