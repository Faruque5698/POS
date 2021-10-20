<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'supplier_name','supplier_address','supplier_phone',
        'supplier_email'
    ];
}
