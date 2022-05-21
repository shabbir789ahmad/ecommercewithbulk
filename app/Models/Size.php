<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
class Size extends Model
{
    use HasFactory;
    protected $fillable=['size'];

   public static function sizes()
    {
        return Size::select('size','id')->get();
    }
}


