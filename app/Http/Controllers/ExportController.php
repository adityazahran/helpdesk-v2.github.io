<?php

namespace App\Http\Controllers;

use App\Exports\AllTicketExport;
use App\Exports\TicketsExport;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_index(){

        $tiket = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('admin.export', ['tiket' => $tiket]);

    }
    

    
    public function export_cek(Request $request)
    {

        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date',
        ]);

        // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);
        
        // $tiket = Ticket::orderBy('id', 'desc')->whereBetween('created_at', [$dari, $sampai])->paginate(5);
        $tiket = Ticket::orderBy('id', 'desc')->where('created_at', '>=' , $dari ,'and','created_at', '<=' , $sampai)->paginate(5);
        $tiket->appends($request->only('dari','sampai'));
        


        return view('admin.export', [
            'tiket' => $tiket,       
        ]);
    }


    public function export_filter_ticket(Request $request)
    {
        // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);
        // $tiket = Ticket::where('created_at', [$dari]);
        $judul = "Helpdesk_".$dari."_".$sampai.".xlsx";
        $nama_export = $dari."_".$sampai;
        return Excel::download(new TicketsExport($dari, $sampai), $nama_export."_Helpdesk.xlsx");
    }
    
    public function export_all_ticket(){
    
        return Excel::download(new AllTicketExport, Time().'_Hepdesk_all.xlsx');
    
    }
}
