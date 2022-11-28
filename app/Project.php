<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_name','status','customer_id','sales_id','lead_id','progress','status','end_date','start_date'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function lead()
    {
        return $this->belongsTo('App\Lead');
    }

}
