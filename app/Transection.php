<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    protected $table ='transections';
    protected $fillable = [
        'order_id','paid_amount','balance',
        'payment_method','user_id','transaction_date',
        'transaction_amount'
    ];
}
