<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
    
        'product_name',
        'detail',
        'shipping_cost',
        'product_status',
        'vendor_id',
        'subcategory_id',

    ];


    function stocks()
    {
        return $this->hasOne(Stock::class)->where('stock','>',0);
    }
    function image()
    {
        return $this->hasOne(Image::class);
    }
    function images()
    {
        return $this->hasMany(Image::class);
    }
}
