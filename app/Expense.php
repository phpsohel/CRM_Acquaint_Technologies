<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable =[
        "reference_no",
         "expense_category_id",
          "warehouse_id", 
          "account_id",
           "user_id", 
           "cash_register_id", 
           "amount", "note"  
    ];

    public function warehouse()
    {
    	return $this->belongsTo('App\Warehouse');
    }

    public function user()
    {
    	return $this->belongsTo('App\User')->select('id','name');
    }

    public function expenseCategory() {
    	return $this->belongsTo('App\ExpenseCategory');
    }
}