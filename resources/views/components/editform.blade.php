
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
                        <option value="Alat Rusak">Alat Rusak</option>
                        <option value="Masalah Interkoneksi">Masalah Interkoneksi</option>
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
                        <option value="Printer">Printer</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="Wi-fi">Wi-fi</option>
                        <option value="Lain-lain">Lain-lain</option>
                    </select>

                </div>