<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professionalServices extends Model
{
    protected $table= 'professional_services';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
