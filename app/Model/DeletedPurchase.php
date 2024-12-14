<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DeletedPurchase extends Model
{

    protected $primaryKey = 'id';

    protected $fillable = [
        'purchase_id',
        'date',
        'user_code',
        'item_code',
        'location',
        'supplier',
        'payment_type',
        'currency',
        'quantity',
        'discount_and_foc',
        'paid',
        'total',
        'balance',
    ];

    public $timestamps = true;

}
