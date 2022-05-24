<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
class Slider extends Model
{
    use HasFactory;
    protected $fillable=['image','slider_detail'];

   public static function sliders()
    {
       return $slider=Cache::remember('slider',15,function(){
            return Slider::select('image')->latest()->get();
        });
        
    }
}
