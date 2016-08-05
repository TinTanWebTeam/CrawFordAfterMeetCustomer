<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
   protected $table = 'claims';
    protected $fillable = [
        'code',
        'branchSeqNo',
        'incident',
        'assignmentTypeCode',
        'accountCode',
        'accountPolicyId',
        'insuredName',
        'insuredClaim',
        'tradingAs',
        'claimTypeCode',
        'lossDescCode',
        'catastrophicLoss',
        'sourceCode',
        'insurerCode',
        'brokerCode',
        'branchCode',
        'branchTypeCode',
        'destroyedDate',
        'lossLocation',
        'lineOfBusinessCode',
        'lossDate',
        'receiveDate',
        'openDate',
        'closeDate',
        'insuredContactedDate',
        'limitationDate',
        'policyInceptionDate',
        'policyExpiryDate',
        'disabilityCode',
        'outComeCode',
        'lastChange',
        'partnershipId',
        'adjusterCode',
        'rate',
        'feeType',
        'taxable',
        'organization',
        'operatedAs',
        'miscInfo',
        'largeLossClaim',
        'policy',
        'reOpen',
        'eBoxDestroyed',
        'firstContact',
        'proscription',
        'initialReserve',
        'currentRes',
        'adjustReserve'
    ];

}
