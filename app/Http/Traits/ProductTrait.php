<?php

namespace App\Http\Traits;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Image;
use App\Models\Follow;
use App\Models\Coupon;
use Auth;

trait ProductTrait
 {

function products($id,$subcategory_id)
   {    
    $request=app('request');
     $query= Product::with('image:product_id,product_image')
       ->leftjoin('reviews','products.id','=','reviews.product_id')
       ->join('stocks','products.id','=','stocks.product_id')
       ->select('reviews.product_id',\DB::raw('avg(rating) as rating'),'products.id','products.product_name','products.subcategory_id','stocks.price','stocks.discount_price')
        ->groupBy('reviews.product_id','products.id','products.product_name','products.subcategory_id','stocks.price','stocks.discount_price')
        ->orderBy('products.created_at','Desc')
        ->where('stocks.stock','>',0);

     if($id)
      {
        $query=$query->where('vendor_id',$id);
      }
      if($subcategory_id)
      {
        $query=$query->where('subcategory_id',$subcategory_id);
      }
      if($request->rating != null)
      {
        $query=$query->where('rating',$request->rating);
      }

      if($request->price != null)
      {
        $query=$query->where('discount_price','<=',$request->price);
      }
      if($request->price != null)
      {
        $query=$query->where('discount_price','>=',$request->price);
      }

       $product=$query->get();
        // dd($product);
       return $product;
     }
     



  function detail($id)
  {
    $detail= Product::with('images','colors','sizes')->leftjoin('reviews','products.id','=','reviews.product_id')
      ->leftjoin('stocks','products.id','=','stocks.product_id')
      ->leftjoin('vendors','vendors.id','products.vendor_id')
      ->select('reviews.product_id', \DB::raw('avg(rating) as rating'),'products.id','products.product_name','products.created_at','products.detail','products.vendor_id','products.subcategory_id','products.shipping_cost','stocks.price','stocks.discount_price','vendors.name','vendors.image','vendors.email')
     ->groupBy('product_id','products.id','products.product_name','products.created_at','products.detail','products.vendor_id','products.subcategory_id','products.shipping_cost','stocks.price','stocks.discount_price','vendors.name','vendors.image','vendors.email')->orderBy('rating','DESC')->where('products.id',$id)->first();
        
        return $detail;
   }

   function cart($id)
   {

    $detail= Product::
       leftjoin('stocks','products.id','=','stocks.product_id')
      ->select('products.id','products.product_name','products.vendor_id','products.subcategory_id','products.shipping_cost','stocks.price','stocks.discount_price')->where('products.id',$id)->first();
           
        return $detail;

   }

 }
?>