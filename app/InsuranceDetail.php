<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceDetail extends Model
{
    protected $table = 'insurance_details';
    protected $fillable = [
        'code',
        'name',
        'description',
        'active',
        'createBy',
        'updateBy',
        'typeOfInsuranceId' 
    ];
}
