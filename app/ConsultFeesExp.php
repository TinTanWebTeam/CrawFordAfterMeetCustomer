<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultFeesExp extends Model
{
    protected $table= 'consult_fees_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
