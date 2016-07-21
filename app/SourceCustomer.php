<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceCustomer extends Model
{
    protected $table = 'source_customers';
    protected $fillable = [
        'code',
        'name',
        'description',
        'active',
        'createdBy',
        'updatedBy'
    ]; 
}
