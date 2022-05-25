<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
class Color extends Model
{
    use HasFactory;
    protected $fillable=['color'];
    
  public static function colors()
    {
        return Color::select('color','id')->get();
    }
    
   
}
