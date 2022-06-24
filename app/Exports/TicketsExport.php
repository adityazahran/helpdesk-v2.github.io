<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class TicketsExport implements FromQuery
{
    /**
        * @return \Illuminate\Support\Collection
        */
       
        use Exportable;
    
        protected $dari;
        protected $sampai;
    
        function __construct($dari,$sampai) {
                $this->dari = $dari;
                $this->sampai = $sampai;
        }
    
        public function query()
        {
            $data = DB::table('tickets')
            ->whereBetween('created_at',[ $this->dari,$this->sampai])
            ->orderBy('id');
    
    
            return $data;
        }
    

}
