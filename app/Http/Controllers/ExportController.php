<?php

namespace App\Http\Controllers;

use App\Exports\TicketsExport;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_index(){

        $tiket = Ticket::orderBy('id', 'desc')->paginate(5);
        

        return view('admin.export', [
            'tiket' => $tiket,
            // compact('header')        
        ]);

    }

    public function export_filter_ticket(Request $request)
    {
                // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);
        // $tiket = Ticket::where('created_at', [$dari]);
        $judul = "Helpdesk_".$dari."_".$sampai.".xlsx";
        // return Excel::download(new TicketsExport($dari, $sampai), $judul);
        echo $dari;
    }


    public function export_cek(Request $request)
    {
        // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);
        echo $dari ;
        
        // $tiket = Ticket::orderBy('id', 'desc')->whereBetween('created_at', [$dari, $sampai])->paginate(5);
        // $tiket->appends($request->only('dari','sampai'));
        


        // return view('admin.export', [
        //     'tiket' => $tiket,       
        // ]);
    }
}
