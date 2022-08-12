<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'leads';


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'assignee_id');
    }

    public function leadStatus()
    {
        return $this->belongsTo('App\Models\LeadStatus', 'lead_status_id');
    }

    public function leadSource()
    {
        return $this->belongsTo('App\Models\LeadSource', 'lead_source_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

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
