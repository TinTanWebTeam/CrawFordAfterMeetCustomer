<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalExp extends Model
{
    protected $table= 'general_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
