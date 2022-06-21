<?php

namespace App\Http\Controllers;

use App\Exports\TicketsExport;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AdminController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $count = DB::table('tickets')->count();
        return view('admin.dashboard', [
            'tiket' => Ticket::orderBy('id', 'desc')->whereRaw('date(created_at) = ?', [Carbon::now()->format('Y-m-d')] )->paginate(5),
            'hitung' => $count,
        ]); 
    }


    

    public function admin_index(Request $request)
    {
        // Table
        $tiket = Ticket::orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->count();
        // if (url()->current() == url('/admin')) {
        // }
        if (url()->current() == url('/admin/diterima')) {
        $count = DB::table('tickets')->where('status', 'like', '%Diterima%')->count();  
        }
        elseif (url()->current() == url('/admin/diproses')) {
        $count = DB::table('tickets')->where('status', 'like', '%Diproses%')->count();
        }
        elseif (url()->current() == url('/admin/dipinjam')) {
        $count = DB::table('tickets')->where('status', 'like', '%Dipinjam%')->count();
        }
        elseif (url()->current() == url('/admin/selesai')) {
        $count = DB::table('tickets')->where('status', 'like', '%Selesai%')->count();
        }
        elseif (url()->current() == url('/admin/ditutup')) {
        $count = DB::table('tickets')->where('status', 'like', '%Ditutup%')->count();
        }

        $header = 'Semua Tiket';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            compact('header')        
        ]);
    }

    public function admin_diproses(Request $request)
    {
        // Table
        $tiket = Ticket::where('status', 'diproses')->orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->where('status', 'Diproses')->count();
        // $header = 'Tiket Diproses';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            // compact('header')        
        ]);
    }

    public function admin_diterima(Request $request)
    {
        // Table
        $tiket = Ticket::where('status', 'diterima')->orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->where('status', 'diterima')->count();
        // $header = 'Tiket diterima';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            // compact('header')        
        ]);
    }

    public function admin_dipinjam(Request $request)
    {
        // Table
        $tiket = Ticket::where('status', 'dipinjam')->orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->where('status', 'dipinjam')->count();
        // $header = 'Tiket dipinjam';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            // compact('header')        
        ]);
    }

    public function admin_selesai(Request $request)
    {
        // Table
        $tiket = Ticket::where('status', 'selesai')->orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->where('status', 'selesai')->count();
        // $header = 'Tiket selesai';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            // compact('header')        
        ]);
    }

    public function admin_tutup(Request $request)
    {
        // Table
        $tiket = Ticket::where('status', 'tutup')->orderBy('id', 'desc')->paginate(5);
        $count = DB::table('tickets')->where('status', 'tutup')->count();
        // $header = 'Tiket tutup';

        return view('admin.index', [
            'tiket' => $tiket,
            'hitung' => $count,    
            // compact('header')        
        ]);
    }


    public function admin_search(Request $request)
    {
        // Search
        $cari = $request->cari;

        $index = Ticket::orderBy('id', 'desc')
        ->where('nama', 'like', "%" . $cari . "%")
        ->orWhere('divisi', 'like', "%" . $cari . "%")
        ->orWhere('topik', 'like', "%" . $cari . "%")
        ->orWhere('alat', '=', "%" . $cari . "%")
        ->paginate(6);
        $count = $index->count(); 

        $header = 'Hasil pencarian : ' . $cari;

        $index->appends($request->only('cari'));
        return view('admin.index', [
            'tiket' => $index,
            'hitung' => $count,
            'header' => $header
            
        ]);
    }



}
