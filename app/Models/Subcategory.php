<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=[
    'category_id',
    'middle_category_id',
    'subcategory_name',
    'subcategory_image',
    ];
}
