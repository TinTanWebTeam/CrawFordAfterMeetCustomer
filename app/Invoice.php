<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table='invoices';
    protected $fillable = [
        'idBill',
        'invoiceDay',
        'invoiceMajorNo',
        'invoiceTempNo',
        'corInsurer',
        'nameBank',
        'exchangeRate',
        'dateExchangeRate',
        'addressBank'
    ];
}
