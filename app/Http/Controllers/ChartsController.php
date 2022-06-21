<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{

    public function chart() {
        $terima = DB::table('tickets')->where('status', 'like', '%Diterima%')->count();
        $proses = DB::table('tickets')->where('status', 'like', '%Diproses%')->count();
        $pinjam = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->count();
        $selesai = DB::table('tickets')->where('status', 'like', '%Selesai%')->count();
        return ([
            'diterima' => $terima,
            'diproses' => $proses,
            'dipinjam' => $pinjam,
            'selesai' => $selesai,
        ]);
    }
}
