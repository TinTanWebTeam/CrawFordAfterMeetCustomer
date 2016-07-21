<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'code',
        'fullName',
        'address',
        'phone',
        'email',
        'addressReserve',
        'phoneReserve',
        'emailReserve',
        'bankAccountName',
        'bankCardNumber',
        'bankAccountName',
        'bankName',
        'contactPersonFirstName',
        'contactPersonLastName',
        'contactPersonPhone',
        'contactPersonEmail',
        'contactPersonFirstNameReserve',
        'contactPersonLastNameReserve',
        'contactPersonPhoneReserve',
        'contactPersonEmailReserve',
        'sourceCustomerId',
        'createdBy',
        'updateBy',
        'active' 
    ];

}
