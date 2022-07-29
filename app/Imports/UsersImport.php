<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lead([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'email' => $row[2],
            'street' => $row[3],
            'city' => $row[4],
            'state' => $row[5],
            'zip_code' => $row[6],
            'phone' => $row[7],
            'website' => $row[8],
            'company' => $row[9],
           

        ]);
    }
}
