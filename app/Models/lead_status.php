<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead_status extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'lead_statuses';
    protected $fillable = ['name','color','status'];
    public function leads()
    {
        return $this->hasMany('App\Models\Lead', 'lead_status_id');
    }
}
