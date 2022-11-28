<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    	protected $fillable = ['checkout_id', 'product_id', 'product_quantity', 'product_price', 'user_ip'];

    public function product()
   	{
   		return $this->belongsTo(product::class, 'product_id');

   		
   	}

   	public function checkout()
   	{
   		return $this->belongsTo(checkout::class, 'checkout_id');

   		
   	}

}
