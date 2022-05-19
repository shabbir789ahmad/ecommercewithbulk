<?php
namespace App\Http\Traits;
use App\Models\Vendor;
use App\Models\Category;
trait CategoryTrait{

  function categories()
  {
    
    
        return Category::select('category','category_image','id')->latest()->get();

  }
 }
?>