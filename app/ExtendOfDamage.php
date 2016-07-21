<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtendOfDamage extends Model
{
    protected $table = 'extend_of_damages';
    protected $fillable = [
        'code',
        'name',
        'extendDamage',
        'description',
        'typeOfDamageId',
        'active',
        'createBy',
        'updateBy' 
    ];
}
