<?php

namespace App\Exports;

use App\Models\Lead;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $user = User::select('first_name','last_name','email')->get();
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
