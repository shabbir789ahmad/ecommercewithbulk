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
    
    $query=Product::with('stocks:product_id,stock,price,discount_price','image:product_id,product_image')->latest()->select('product_name','id');
     
      if($id)
      {
        $query=$query->where('vendor_id',$id);
      }
      if($subcategory_id)
      {
        $query=$query->where('subcategory_id',$subcategory_id);
      }
       $product=$query->get();
       // dd($product);
       return $product;
     }
     



  function detail($id)
  {
    $detail= Product::with('images')->
      leftjoin('reviews','products.id','=','reviews.product_id')
      ->leftjoin('stocks','products.id','=','stocks.product_id')
      ->select('reviews.product_id', \DB::raw('avg(rating) as rating'),'products.id','products.product_name','products.created_at','products.detail','products.vendor_id','products.subcategory_id','stocks.price','stocks.discount_price','products.shipping_cost')
     ->groupBy('product_id','products.id','products.product_name','products.created_at','products.detail','products.vendor_id','products.subcategory_id','stocks.price','stocks.discount_price','products.shipping_cost')->orderBy('rating','DESC')->where('products.id',$id)->first();
        
        return $detail;
   }

   function detail2($id,$drop_id,$vid)
   {
    $query= Stock::
     leftjoin('reviews','stocks.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'stocks.id','stocks.product','stocks.created_at','stocks.drop_id')
        ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.drop_id')->orderBy('rating','DESC');
         if($drop_id)
         {
           $query=$query->where('stocks.drop_id',$drop_id);
         }
         if($vid)
         {
           $query=$query->where('stocks.vendor_id',$vid);
         }
         
        $detail2=$query->get();
        foreach($detail2 as $dt)
        {
          $dt->image=Image::where('image_id',$dt->id)->take(1)->get();
         $dt->stock2=Stock2::where('stock_id',$dt->id)
           ->where('stock_status','1')->take(1)->get();
        }
        return $detail2;
   }

 }
?>