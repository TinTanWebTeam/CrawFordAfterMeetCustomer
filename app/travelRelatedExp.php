<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRelatedExp extends Model
{
    protected $table= 'travel_related_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
