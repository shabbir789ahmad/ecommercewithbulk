<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $fillable=['logo'];


public static function logo()
{
    return Logo::select('logo','id')->latest()->get();
}
   
}
