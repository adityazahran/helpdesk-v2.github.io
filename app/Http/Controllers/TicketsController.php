<?php

namespace App\Http\Controllers;

use App\Exports\TicketsExport;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class TicketsController extends Controller
{
    public function index()
    {
        return view('tickets.index', [
            'tickets' => Ticket::orderBy('id', 'desc')->paginate(5)
        ]);
    }
    public function create()
    {
        return view('tickets.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'divisi' => 'required',
            'topik' => 'required',
            'alat' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $file = $request->file('file');
        if($file != null){
		$nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        }
        Ticket::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'topik' => $request->topik,
            'alat' => $request->alat,
            'keterangan' => $request->keterangan ?? '-',
            'file' => $nama_file ?? null,
            'status' => $request->status ?? 'Diterima'

        ]);

        session()->flash('success', 'Tiket baru berhasil terdaftar');
        return redirect('/');
    }

    public function edit($id)
    {

        // $Tickets = Ticket::where('id', $id)->first();
        $index = Ticket::find($id);
        return view('tickets.edit', ['edit' => $index]);
    }

    public function update(Request $request, $id)
    {

        Ticket::find($id)->update([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'topik' => $request->topik,
            'alat' => $request->alat,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect('admin');
    }

    public function check()
    {
        $tiket = Ticket::orderBy('id', 'desc')->paginate(5);
        return view('tickets.search', ['tiket' => $tiket]);
    }

    public function search(Request $request)
    {

        $cari = $request->cari;

        $tiket = Ticket::orderBy('id', 'desc')
            ->where('nama', 'like', "%" . $cari . "%")
            ->orWhere('divisi', 'like', "%" . $cari . "%")
            ->orWhere('topik', 'like', "%" . $cari . "%")
            ->orWhere('alat', '=', "%" . $cari . "%")
            ->paginate(4);

        $tiket->appends($request->only('cari'));

        return view('tickets.search', ['tiket' => $tiket]);
    }

    public function export_ticket()
    {
        return Excel::download(new TicketsExport, 'Helpdesk.xlsx');
    }

    public function detail($id)
    {

        $index = Ticket::find($id);
        return view('tickets.detail', ['detail' => $index]);

    } 



    public function destroy($id){

        Ticket::find($id)->delete();
        return redirect('admin');
        }


}
