<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=['detail',
    'product',
    'size_image',
    'product_status',
    'on_sale',
    'drop_id',
    'cat_id',
    'vendor_id'
   
   ];
}
