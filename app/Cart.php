<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   	protected $fillable = ['product_id', 'product_quantity', 'product_price', 'user_ip'];

   	public function product()
   	{
   		return $this->belongsTo(product::class, 'product_id');

   		
   	}

}


