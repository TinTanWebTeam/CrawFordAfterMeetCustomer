<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimTaskDetail extends Model
{
    protected $table = 'claim_task_details';
    protected $fillable = [
        'code1',
        'time1',
        'note1',
        'code2',
        'time2',
        'note2',
        'active',
        'claimId',
        'statusId',
        'userId',
        'createBy',
        'updateBy' 
    ];
}
