<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddleCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'middlecategory_name',
      ];

     
     public  function subcategory()
       {
         return $this->hasMany('\App\Models\Subcategory','middle_category_id');
        }
      
}
