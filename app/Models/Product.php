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
     
   
      public function getproductNameAttribute($value)
    {
        return ucfirst($value);
    }
   
    function image()
    {
        return $this->hasOne(Image::class);
    }
    function images()
    {
        return $this->hasMany(Image::class);
    }
    function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
