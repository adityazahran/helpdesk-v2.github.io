<?php

namespace App\View\Components;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Navbar extends Component
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
        $navigations = [
            'Home' => '/',
            'Buat Tiket Baru' => '/ticket/create',
            'Cek Status Tiket' => '/ticket/search'
        ];
        return view('layouts.navbar', compact('navigations'));
    }

    
}
