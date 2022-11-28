<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name','date','customer_group_id','status','stage','description','company','email','another_email','designation','phone_number','another_phone_no','address','is_remainder','lead_status_id','lead_source_id','lead_category_id','employee_id','user_id','noti_datetime','thana_id'];



    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function thana()
    {
        return $this->belongsTo('App\Thana');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lead_status()
    {
        return $this->belongsTo('App\LeadStatus');
    }

    public function lead_source()
    {
        return $this->belongsTo('App\LeadSource');
    }

    public function lead_category()
    {
        return $this->belongsTo('App\LeadCategory');
    }




}


