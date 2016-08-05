<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateDetail extends Model
{
    protected $table = 'rate_details';
    protected $fillable = [
        'value',
        'description',
        'active',
        'rateTypeId',
        'userId',
        'claimId',
        'createdBy',
        'updatedBy'
    ];


}
