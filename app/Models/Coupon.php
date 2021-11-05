<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable=
    [
     'code',
     'type',
     'value',
     'min_order_amnt',
     'coupon_status',
     'limit',
     'vendor_id',
     'exp_date',
    ];
}
