<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Detail extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
     'product',
     'price',
     'quentity',
     'image',
     'detail',
     'total',
     'color',
     'size',
     'product_id',
     'drop_id',
     'order_status',
     'order_id'
    ];


    
}
