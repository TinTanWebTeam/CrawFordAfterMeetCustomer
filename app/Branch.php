<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $tabe = 'branches';
    protected $fillable = [
        'code',
        'name',
        'description',
        'branchTypeCode',
        'customerCode',
        'createdBy',
        'updateBy',
        'active' 
    ];

}
