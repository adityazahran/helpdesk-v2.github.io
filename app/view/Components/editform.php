<?php

namespace App\View\Components;

use Illuminate\View\Component;

class editform extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $divisi = 
        [
            'Pemasaran' => 'Pemasaran',
            'Produksi' => 'Produksi',
            'Distribusi dan Layanan Teknik' => 'DLT',
            'Pengembangan Perusahaan' => 'Pengembangan',
            'Pengendalian Teknik' => 'Pengendalian',
            'Teknologi Informasi' => 'TI',
            'Keuangan' => 'Keuangan',
            'Pengadaan dan Logistik' => 'Pengadaan',
            'Perencanaan Teknik' => 'Perencanaan',
            'Sumber Daya Manusia' => 'SDM',
            'Satuan Pengawasan Intern' => 'SPI',
            'Sekertaris Perusahaan' => 'SP',
            'Lain-lain' => 'Lain-lain',
        ];

        $divisiselect = [
            'Pemasaran',
            'Produksi',
            'DLT',
            'Pengembangan',
            'Pengendalian',
            'TI',
            'Keuangan',
            'Pengadaan',
            'Perencanaan',
            'SDM',
            'SPI',
            'SP',
            'Lain-lain',
        ];
        return view('components.editform', compact('divisi'), compact('divisiselect'));
    }
}
