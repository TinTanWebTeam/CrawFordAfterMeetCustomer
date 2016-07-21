<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $table = 'brokers';
    protected $fillable=[
        'code',
        'firstName',
        'lastName',
        'phone',
        'email',
        'address',
        'bankAccountNumber',
        'bankCardNumber',
        'bankAccountName',
        'bankName',
        'createdBy',
        'updateBy', 
        'active'
    ];
}
