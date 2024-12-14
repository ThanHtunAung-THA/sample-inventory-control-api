<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{

    protected $table = 'sales';

    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'user_code',
        'item_code',
        'location',
        'customer',
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