<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorSale extends Model
{
    use HasFactory;
    protected $fillable=[

     'vendor_sell_id',
     'vendor_new_price',
     'vendor_discount',
     'vendor_on_sale',
     'vendor_sale_id',

    ];
}
