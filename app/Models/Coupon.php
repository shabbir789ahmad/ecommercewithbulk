<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
class Coupon extends Model
{
    use HasFactory;
    protected $fillable=
    [
     'code',
     'value',
     'min_order_amnt',
     'coupon_status',
     'limit',
     'vendor_id',
     'exp_date',
    ];

    public static function coupons()
    {
        return Coupon::all();
    }
}
