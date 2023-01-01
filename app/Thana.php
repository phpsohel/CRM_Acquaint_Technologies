<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $fillable = [
        'district_id',
        'name',
    ];
    protected $table = "thana";
}
