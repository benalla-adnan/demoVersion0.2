<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'leads';

    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'state',
        'city',
        'zip_code',
        'website',
        'company',
        'description', 
        'email',
        'phone',
        'lead_status_id'
    ];
}
