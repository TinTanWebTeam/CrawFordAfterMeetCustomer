<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gStFreeDisb extends Model
{
    protected $table= 'g_st_free_disbs';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
