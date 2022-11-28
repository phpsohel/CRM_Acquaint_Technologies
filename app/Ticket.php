<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['subject','project_id','ticket_code','status','customer_id','lead_cat_id','description','priority','employee_id','department_id','attachment'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }


    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function lead_cat()
    {
        return $this->belongsTo('App\LeadCategory');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
