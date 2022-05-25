<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable=[
     
     'product_name',
     'quentity',
     'sub_total',
     'color',
     'size',
     'ship',
     'image',
     'order_status',
     
     'product_id',
     'vendor_id',
     'order_id'
    ];
}
