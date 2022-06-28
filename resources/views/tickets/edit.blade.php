<x-admin-layout>
    <div class="container">
        <div class="text-center mt-8 mb-12">
            <h3 class="font-bold text-3xl">Edit Tiket</h3>
        </div>
        <form action="/ticket/{{ $edit ->id }}" method="post" class="flex flex-col flex-1 w-8/12 mx-auto font-semibold">
            @method('put')
            @csrf
             
<div
class="block md:flex w-full flex-1 mx-auto gap-2 justify-center mb-2 space-y-2 md:space-y-0">
<input type="text" name="nama" value="{{ $edit->nama }}" placeholder="Nama Pengisi Tiket"
    class=" @error('nama') border-red-500 @else border-gray-500 @enderror rounded w-full md:w-1/2 px-2 py-4 border ">
<select name="divisi" id="" class="@error('divisi') border-red-500 @else border-gray-500 @enderror rounded w-full md:w-1/2 px-2 py-4 ">
    
    <option value="" hidden="">Divisi</option>
                            <option <?php  if($edit->divisi == "Pemasaran"){echo "selected='selected'";} ?>  value="Pemasaran">Pemasaran</option>    
                            <option <?php  if($edit->divisi == "Produksi"){echo "selected='selected'";} ?> value="Produksi">Produksi</option>    
                            <option <?php  if($edit->divisi == "DLT"){echo "selected='selected'";} ?> value="DLT">Distribusi dan Layanan Teknik</option>    
                            <option <?php  if($edit->divisi == "Pengembangan"){echo "selected='selected'";} ?> value="Pengembangan">Pengembangan Perusahaan</option>    
                            <option <?php  if($edit->divisi == "Pengendalian"){echo "selected='selected'";} ?> value="Pengendalian">Pengendalian Teknik</option>    
                            <option <?php  if($edit->divisi == "TI"){echo "selected='selected'";} ?> value="TI">Teknologi Informasi</option>    
                            <option <?php  if($edit->divisi == "Keuangan"){echo "selected='selected'";} ?> value="Keuangan">Keuangan</option>    
                            <option <?php  if($edit->divisi == "Pengadaan"){echo "selected='selected'";} ?> value="Pengadaan">Pengadaan dan Logistik</option>    
                            <option <?php  if($edit->divisi == "Perencanaan"){echo "selected='selected'";} ?> value="Perencanaan">Perencanaan Teknik</option>    
                            <option <?php  if($edit->divisi == "SDM"){echo "selected='selected'";} ?> value="SDM">Sumber Daya Manusia</option>    
                            <option <?php  if($edit->divisi == "SPI"){echo "selected='selected'";} ?> value="SPI">Satuan Pengawasan Intern</option>    
                            <option <?php  if($edit->divisi == "SP"){echo "selected='selected'";} ?> value="SP">Sekertaris Perusahaan</option>    
                            <option <?php  if($edit->divisi == "Lain-lain"){echo "selected='selected'";} ?> value="Lain-lain">Lain-lain</option>    
                        
</select>

</div>

<div
class="block md:flex w-full flex-1 mx-auto gap-2 justify-center mb-4 md:mb-2 space-y-2 md:space-y-0">
<select name="topik" id="" class="@error('topik') border-red-500 @else border-gray-500 @enderror masalah rounded w-full md:w-1/2 px-2 py-4">
    <option value=""  hidden>Isu Masalah</option>
    <option value="Alat Rusak" <?php  if($edit->topik == "Alat Rusak"){echo "selected='selected'";} ?>>Alat Rusak</option>
    <option value="Peminjaman Alat" <?php  if($edit->topik == "Peminjaman Alat"){echo "selected='selected'";} ?>>Peminjaman Alat</option>
    <option value="Masalah Interkoneksi" <?php  if($edit->topik == "Masalah Interkoneksi"){echo "selected='selected'";} ?>>Masalah Interkoneksi</option>
    <option value="Sistem Error / Tidak Berfungsi" <?php  if($edit->topik == "Sistem Error / Tidak Berfungsi"){echo "selected='selected'";} ?>>Sistem Error / Tidak Berfungsi</option>
    <option value="Lain-Lain" <?php  if($edit->topik == "Lain-Lain"){echo "selected='selected'";} ?>>Lain-Lain</option>
</select>

<script>
    $(function() {
    $("select.masalah").on("change",function() {
        $(".alat").removeAttr("disabled",this.value =="Alat Rusak");
    }).change();
});
</script>

<select name="alat" id="" class="@error('alat') border-red-500 @else border-gray-500 @enderror alat rounded w-full md:w-1/2 px-2 py-4">
    <option value="" hidden>Alat-Alat</option>
    <option  <?php  if($edit->alat == "PC"){echo "selected='selected'";} ?> value="PC">PC</option>
    <option  <?php  if($edit->alat == "AIO"){echo "selected='selected'";} ?> value="AIO">AIO</option>
    <option  <?php  if($edit->alat == "Laptop"){echo "selected='selected'";} ?>value="Laptop">Laptop</option>
    <option  <?php  if($edit->alat == "Printer"){echo "selected='selected'";} ?> value="Printer">Printer</option>
    <option  <?php  if($edit->alat == "Mouse"){echo "selected='selected'";} ?>value="Mouse">Mouse</option>
    <option  <?php  if($edit->alat == "Keyboard"){echo "selected='selected'";} ?>value="Keyboard">Keyboard</option>
    <option  <?php  if($edit->alat == "Wi-fi"){echo "selected='selected'";} ?>value="Wi-fi">Wi-fi</option>
    <option  <?php  if($edit->alat == "Lain-lain"){echo "selected='selected'";} ?>value="Lain-lain">Lain-lain</option>
</select>

</div>
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