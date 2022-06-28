<div
                    class="block md:flex w-full flex-1 mx-auto gap-2 justify-center mb-2 space-y-2 md:space-y-0">
                    <input type="text" name="nama" value="{{ old('name') }}" placeholder="Nama Pengisi Tiket"
                        class=" @error('nama') border-red-500 @else border-gray-500 @enderror rounded w-full md:w-1/2 px-2 py-4 border ">

                    <select name="divisi" id="" class="@error('divisi') border-red-500 @else border-gray-500 @enderror rounded w-full md:w-1/2 px-2 py-4 ">
                        <option value="" hidden>Divisi</option>
                        @foreach($divisi as $name => $input)
                        <option value="{{ $input }}">{{ $name }}</option>    
                        @endforeach
                    </select>

                </div>

                <div
                    class="block md:flex w-full flex-1 mx-auto gap-2 justify-center mb-4 md:mb-2 space-y-2 md:space-y-0">

                    <select name="topik" id="" class="@error('topik') border-red-500 @else border-gray-500 @enderror masalah rounded w-full md:w-1/2 px-2 py-4">
                        <option value="" hidden>Isu Masalah</option>
                        <option value="Alat Rusak">Alat Rusak</option>
                        <option value="Peminjaman Alat">Peminjaman Alat</option>
                        <option value="Masalah Interkoneksi">Masalah Interkoneksi</option>
                        <option value="Sistem Tidak Berfungsi">Sistem Tidak Berfungsi</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </select>

                    <script>
                        $(function() {
                        $("select.masalah").on("change",function() {
                            $(".alat").removeAttr("disabled",this.value =="Alat Rusak");
                        }).change();
                    });
                    </script>

                    <select name="alat" id="" class="@error('alat') border-red-500 @else border-gray-500 @enderror alat rounded w-full md:w-1/2 px-2 py-4" disabled="disabled">
                        <option value="" hidden>Alat-Alat</option>
                        <option value="PC">PC</option>
                        <option value="AIO">AIO</option>
                        <option value="Printer">Printer</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Wi-fi">Wi-fi</option>
                        <option value="Lain-lain">Lain-lain</option>
                    </select>

                </div>