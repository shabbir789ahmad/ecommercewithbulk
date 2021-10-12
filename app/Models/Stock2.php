<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock2 extends Model
{
    use HasFactory;
    protected $fillable=[
    'stock',
    'price',
    'sell_price',
    'ship',
    'discount',
    'supply_id',
    'stock_id',
   ];
}
