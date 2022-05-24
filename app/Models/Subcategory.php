<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=[
    'category_id',
    'middle_category_id',
    'subcategory_name',
    'subcategory_image',
    ];

    public static function subcategories()
    {
      return Cache::remember('subcategories',15,function(){

         return Subcategory::select('subcategory_name','id')->latest()->get();

        });
    }
}
