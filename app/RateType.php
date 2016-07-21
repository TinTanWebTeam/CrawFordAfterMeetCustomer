<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateType extends Model
{
    protected $table = 'rate_types';
    protected $fillable = [
        'code',
        'name',
        'description',
        'active',
        'createdBy',
        'updatedBy'
    ]; 
}
