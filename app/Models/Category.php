<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
class Category extends Model
{
    use HasFactory;
     protected $fillable=['category','category_image'];


   public static function category()
    {
       $sub=  Cache::remember('sub',14,function(){
       return Category::with('categories.subcategory')->get();

        });
       
        $sub=json_decode(json_encode($sub),true);
        
        return $sub;
    }
   

      public function getcategoryAttribute($value)
    {
        return ucfirst($value);
    }
  

   
    public function categories()
    {
         return $this->hasMany(MiddleCategory::class);
    }
    // public static function category()
    // {
    //     return Category::join('middle_categories','categories.id','=','middle_categories.category_id')
    //     ->join('subcategories','middle_categories.id','=','subcategories.middle_category_id')
    //     ->select('categories.category','middle_categories.middlecategory_name','subcategories.subcategory_name','subcategories.id')->get();
    // }
}
