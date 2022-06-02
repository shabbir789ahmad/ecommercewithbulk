<?php 
namespace App\Helpers;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Image;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductBrand;

use Auth;
class ProductHelper
{
 
   function createProduct($req)
   {
 	  return Product::create([ 
           'product_name'=> $req->product_name,
           'detail'=>$req->detail,
           'subcategory_id'=>$req->subcategory_id,
           'shipping_cost'=>$req->shipping_cost??null,
           'vendor_id'=>Auth::user()->id,
        ]);
   }

   function createStock($req,$product)
   { 
   
   	
   	Stock::create([ 
           'stock'=> $req->stock,
           'price'=>$req->price,
           'discount_price'=>$req->discount_price,
           'product_id'=>$product['id'],
        ]);
   }

   function createColors($req,$product)
   {
      	
   	    $n = sizeof($req->color);

         for($i = 0; $i < $n; $i++) 
         {
           ProductColor::create([
            'color' => $req->color[$i],
            'color_status' =>'1',
            'product_id' =>$product['id'],
             ]);
          }
   }

   function createSizes($req,$product)
   {
          
         $n2 = sizeof($req->size);

          for($i = 0;  $i < $n2; $i++)
           { 
            
            ProductSize::create([
           'size' =>$req->size[$i],
           'size_status' =>'1',
            'product_id' =>$product['id'],
            ]);
           }

   }


   function createBrands($req,$product)
   {

     
   	 if($req->brand)
         {
            $n3 = sizeof($req->brand);
          for($i = 0;  $i < $n3; $i++)
           {
            ProductBrand::create([
             'product_brand' =>$req->brand[$i],
             'brand_status' =>'1',
             'product_id' =>$product['id'],
            ]);
           }
         }
   }

   function createImages($req,$product)
   {
   	 foreach($req->file('images') as $file)
           {
              $ext=$file->getClientOriginalExtension();
              $filename= time().rand(1,100).'.'.$ext;
              $file->move('uploads/img/',$filename);
             Image::create([
              'product_image'=>$filename,
              'product_id'=> $product['id'],
              ]);
      
           }
   }


}

