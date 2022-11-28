<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = ['customer_name', 'phone_number', 'address', 'city','total_price', 'notes','user_ip'];

    public function cart()
    {
    	return $this->belongsTo(cart::class, 'user_ip');
    }
}
