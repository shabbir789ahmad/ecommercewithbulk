<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=
    [
     'user_name',
     'message',
     'rating',
     'image',
     'user_id',
     'product_id',
    ];
}
