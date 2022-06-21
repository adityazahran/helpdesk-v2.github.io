<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AdminLayout extends Component
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
        // Count
        $all = DB::table('tickets')->count();
        $accepted = DB::table('tickets')->where('status', 'like', '%Diterima%')->count();
        $proccess = DB::table('tickets')->where('status', 'like', '%Diproses%')->count();
        $borrowed = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->count();
        $finish = DB::table('tickets')->where('status', 'like', '%Selesai%')->count();
        $closed = DB::table('tickets')->where('status', 'like', '%Ditutup%')->count();
        return view('layouts.admin', [
            'semua' => $all,
            'terima' => $accepted,
            'proses' => $proccess,
            'pinjam' => $borrowed,
            'selesai' => $finish,
            'ditutup' => $closed,
        ] );
    }
}
