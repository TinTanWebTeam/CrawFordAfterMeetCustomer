<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'percentage',
        'billTold',
        'claimOfficer',
        'policyNumber', 
        'CompClaimNumber',
        'claimId',
        'active',
        'createdBy',
        'updateBy'
        
    ];
}
