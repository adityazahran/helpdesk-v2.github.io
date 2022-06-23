<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(){

            $index = Ticket::orderBy('id', 'desc')->Paginate(4);
            return view('home', ['tiket' => $index]);
    
        }
}
