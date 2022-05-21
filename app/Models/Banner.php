<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banner;
class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
      'heading1',
      'heading2',
      'banner',
    ];

    public static function banners()
     {
       $banner=Banner::latest()->take(3)->get();
       return $banner;
     }
}
