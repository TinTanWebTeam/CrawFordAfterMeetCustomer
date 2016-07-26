<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commAndPhotoExp extends Model
{
    protected $table= 'comm_and_photo_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
