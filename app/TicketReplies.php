<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReplies extends Model
{
    protected $fillable = ['ticket_id','description','employee_id','attachment'];



    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }
}
