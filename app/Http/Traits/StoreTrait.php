<?php

namespace App\Http\Traits;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Image;
use App\Models\Category;
use App\Models\Submenue;
use App\Models\Dropdown;
use App\Models\Banner;
use App\Models\Sell;
use Auth;
 trait StoreTrait {
     
     public function dropdown()
     {
       $drop=Dropdown::all();
       return $drop;
     }
     function sale()
     {
      $sale=Sell::latest()->take(1)->get();
      return $sale;
     }
     function banner()
     {
      $banner=Banner::latest()->take(1)->get();
      return $banner;
     }

     public function stockNew()
      {

        $storenew= Stock::
       leftjoin('reviews','stocks.id','=','reviews.review_id')
       ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id')->orderBy('rating','DESC')
       ->where('stocks.user_id',Auth::user()->id)
       ->whereMonth('stocks.created_at',date('m'))->get();
      foreach($storenew as $st)
      {
        $st->image=Image::where('image_id',$st['id'])->take(1)->get();
        $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
      }
      return $storenew;
      }

     

 }

?>