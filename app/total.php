<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class total extends Model
{
    protected $table= 'totals';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
