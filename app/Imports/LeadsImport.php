<?php

namespace App\Imports;

use App\Models\Lead;
use App\Models\lead_status;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LeadsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
protected $_lead_status = null;
public function __construct($lead_status)
{
    $this->_lead_status=$lead_status;
}
    public function model(array $row)
    {
        
        return new Lead([
            'first_name'=> $row['first_name'],
            'last_name'=> $row['last_name'],
            'email' => $row['email'],
            'street' => $row['street'],
            'city' => $row['city'],
            'state' => $row['state'],
            'zip_code' => $row['zip_code'],
            'phone'=> $row['phone'],
            'website' => $row['website'],
            'description' => $row['description'],
            'lead_status_id' => $this->_lead_status,
        ]);
    }
}
