<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable=[
     'sell_id',
     'sale_id',
     'new_price',
     'discount',
     'on_sale'
    ];
}
