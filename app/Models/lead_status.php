<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_status extends Model
{
    use HasFactory;
    protected $table = 'lead_statuses';
    protected $fillable = ['name','color','status'];
}
