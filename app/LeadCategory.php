<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadCategory extends Model
{
    protected $fillable = ['lead_cat_name','status','description'];
}
