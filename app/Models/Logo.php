<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;
class Logo extends Model
{
    use HasFactory;
    protected $fillable=['logo'];


    public static function logo()
    {
      return Cache::remember('logo',15,function(){

        return Logo::select('logo','id')->latest()->get();
      });
   
    }
   
}
