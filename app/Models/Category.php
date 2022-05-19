<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable=['category','category_image'];


   public static function category()
    {
        $sub=Category::with('categories.subcategory')->get();
        $sub=json_decode(json_encode($sub),true);
        // dd($sub);
        return $sub;
    }

    // public  function subcat()
    // {
    //    return $this->hasMany('\App\Models\MiddleCategory','category_id');
    // }
    //   public  function drop()
    // {
    //    return $this->hasMany('\App\Models\Subcategory','category_id');
    // }

    // public function categories2()
    // {
    //       return $this->hasManyThrough(
    //         subcategory::class,
    //         MiddleCategory::class,
            
            
    //     );
    // }
    public function categories()
    {
         return $this->hasMany(MiddleCategory::class);
    }
}
