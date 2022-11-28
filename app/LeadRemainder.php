<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadRemainder extends Model
{
    protected $fillable = ['lead_id','status','remainder_id'];


    public function remainder()
    {
        return $this->belongsTo('App\Remainder');
    }

    public function lead()
    {
        return $this->belongsTo('App\Lead');
    }
}
