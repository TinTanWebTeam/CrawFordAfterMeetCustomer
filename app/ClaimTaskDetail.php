<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimTaskDetail extends Model
{
    protected $table = 'claim_task_details';
    protected $fillable = [
        'professionalServices',
        'professionalServicesTime',
        'professionalServicesTimeBillValue',
        'professionalServicesTimeOverrideValue',
        'professionalServicesNote',
        'professionalServicesRate',
        'professionalServicesRateBillValue',
        'professionalServicesRateOverrideValue',
        'professionalServicesAmount',
        'professionalServicesAmountBillValue',
        'professionalServicesAmountOverrideValue',
        'expense' ,
        'expenseAmount',
        'expenseAmountBillValue',
        'expenseAmountOverrideValue',
        'expenseNote',
        'active',
        'claimId',
        'statusId',
        'userId',
        'createdBy',
        'updatedBy'
    ];
}
