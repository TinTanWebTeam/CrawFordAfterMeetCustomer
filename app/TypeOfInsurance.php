<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfInsurance extends Model
{
    protected $table = 'type_of_insurances';
    protected $fillable = [
        'code',
        'name',
        'description',
        'active',
        'createBy',
        'updateBy'
    ]; 
}
