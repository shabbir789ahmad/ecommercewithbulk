<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Product extends Model
{
    use HasFactory , Notifiable;
    protected $fillable=
    [
        'name',
        'detail',
        'price',
        'sell_price',
        'stock',
        'ship',
        'product_status',
        'drop_id',
        'sell_price',
        
        
    ];


  
}
