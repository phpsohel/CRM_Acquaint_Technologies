<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSetting extends Model
{
    protected $fillable =[

        "company_name", "site_logo", "address", "email", "phone", "website", "fax", "developed_by", "logo_position"
    ];
}
