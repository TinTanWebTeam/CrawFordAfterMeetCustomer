<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfDamage extends Model
{
    protected $table = 'type_of_damages';
    protected $fillable = [
        'code',
        'name',
        'claimId',
        'description',
        'active',
        'createdBy',
        'updateBy '
    ];
}
