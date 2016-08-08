<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommPhotoExp extends Model
{
    protected $table= 'comm_photo_exps';
    protected $fillable = [
        'id',
        'billId',
        'userId',
        'value',
        'createdBy',
        'updatedBy'
    ];
}
