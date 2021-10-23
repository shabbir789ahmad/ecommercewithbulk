<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable=['category'];

   public static function category()
    {
        $sub=Category::with('subcat')->with('drop')->get();
        $sub=json_decode(json_encode($sub),true);
        //echo "<pre>"; print_r($sub);die;
        return $sub;
    }

    public  function subcat()
    {
       return $this->hasMany('\App\Models\Submenue','menue_id');
    }
      public  function drop()
    {
       return $this->hasMany('\App\Models\Dropdown','category_id');
    }
}
