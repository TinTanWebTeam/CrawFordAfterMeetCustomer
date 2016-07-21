<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = [
        'code',
        'name',
        'description',
        'reference',
        'active',
        'createBy',
        'updateBy'
    ]; 
}
