<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name'=> $row['first_name'],
            'last_name'=> $row['last_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
           
        ]);
    }
}
