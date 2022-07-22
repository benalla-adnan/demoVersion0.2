<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_sources extends Model
{
    use HasFactory;
    protected $table = 'lead_sources';
    protected $fillable = ['name','status'];
}
