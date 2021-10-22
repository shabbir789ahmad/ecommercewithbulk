<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    use HasFactory;
   
   protected $fillable=[
    'category_id',
    'dropdown_id',
    'name',
    'drop_image',
    ];
}
