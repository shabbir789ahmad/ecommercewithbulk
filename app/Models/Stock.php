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
    'drop_id',
    'user_id'
   
   ];
}
