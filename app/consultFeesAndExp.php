<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultFeesAndExp extends Model
{
    protected $table= 'consult_fees_and_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
