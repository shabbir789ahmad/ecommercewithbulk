<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Image;
class StoreController extends Controller
{
    function showStore($id)
    {
       $store= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id')
     ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id')->orderBy('rating','DESC')
     ->where('stocks.user_id',$id)->get();
     foreach($store as $st)
     {
        $st->image=Image::where('image_id',$st['id'])->take(1)->get();
     }
     //dd($store);
     return view('store',compact('store'));
    }
}
