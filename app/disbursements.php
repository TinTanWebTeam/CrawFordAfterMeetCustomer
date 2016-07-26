<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disbursements extends Model
{
    protected $table= 'disbursements';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
