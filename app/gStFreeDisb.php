<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GstFreeDisb extends Model
{
    protected $table= 'gst_free_disbs';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
