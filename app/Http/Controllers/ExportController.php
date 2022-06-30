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
    public function export_index()
    {

        $tiket = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('admin.export', ['tiket' => $tiket]);
    }



    public function export_cek(Request $request)
    {

        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date|after_or_equal:dari',
        ]);

        // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);

        $dibuat = Ticket::all()->min('created_at');

        // $tiket = Ticket::orderBy('id', 'desc')->whereBetween('created_at', [$dari, $sampai])->paginate(5);
        if ($dari > $dibuat) {
            $tiket = Ticket::orderBy('id', 'desc')->where('created_at', '>=', $dari, 'and', 'created_at', '<=', $sampai)->paginate(5);
            $tiket->appends($request->only('dari', 'sampai'));

            return view('admin.export', [
                'tiket' => $tiket,
            ]);
        } else {
            session()->flash('minexport', 'Tidak ada data yang dapat ditampilkan | Tiket pertama dibuat pada ' . $dibuat->format('d M Y'));
            return redirect('admin/export');
        }
    }


    public function export_filter_ticket(Request $request)
    {
        // Table
        $dari = date($request->dari);
        $sampai = date($request->sampai);
        $dibuat = Ticket::all()->min('created_at');
        $nama_export = $dari . "_" . $sampai;

        if ($dari > $dibuat){
        return Excel::download(new TicketsExport($dari, $sampai), $nama_export . "_Helpdesk.xlsx");
        } else {
            session()->flash('minexport', 'Tidak ada data yang dapat di-export | Tiket pertama dibuat pada ' . $dibuat->format('d M Y'));
            return redirect('admin/export');
        }
    }

    public function export_all_ticket()
    {

        return Excel::download(new AllTicketExport, Time() . '_Hepdesk_all.xlsx');
    }
}
