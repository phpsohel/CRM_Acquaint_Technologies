<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remainder extends Model
{
    protected $fillable = ['noti_datetime','status','description','employee_id','user_id','lead_id','stage'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function lead()
    {
        return $this->belongsTo('App\Lead');
    }
}
