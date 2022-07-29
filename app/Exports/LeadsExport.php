<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    
    public function collection()
    {


        $user = Lead::select('first_name','last_name','email')->get();
       // return Lead::all();
       return $user;
    }

    public function headings(): array

    {

        return [

            'first_name',

            'last_name',

            'email',

        ];

    }
}

