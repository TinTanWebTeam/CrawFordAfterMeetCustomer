<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineOfBusiness extends Model
{
    protected $table='line_of_businesses';
    protected $fillable = [
        'code',
        'name',
        'description',
        'createBy',
        'updateBy',
        'active' 
    ];
}
