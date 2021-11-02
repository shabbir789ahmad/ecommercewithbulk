<?php

namespace App\Http\Traits;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Image;

trait ProductTrait
 {

function storeProduct($id)
   {    
       $time=Carbon::now();
        $req = app('request');
        $new="";
        $top="";
        $drop="";
        $promote="";
        if($req->get('promoted') !== Null)
        {
            $promote=$req->get('promoted');
        }
        if($req->get('newpro') !== Null)
        {
            $new=$req->get('newpro');
        }
        if($req->get('topr') !== Null)
        {
            $top=$req->get('topr');
        }
        if($req->get('drop_search') !== Null)
        {
            $drop=$req->get('drop_search');
        }
       
       $query= Stock::
         join('stock2s','stocks.id','=','stock2s.stock_id')
         ->leftjoin('sponsers','stocks.id','=','sponsers.sponser_id')
         ->leftjoin('sales','stocks.id','=','sales.sale_id')
        ->leftjoin('reviews','stocks.id','=','reviews.review_id')
        ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.ship','stock2s.stock_status','sponsers.sponser','sponsers.sponser_start','sponsers.sponser_end','sales.on_sale','sales.new_price','sales.discounts')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.ship','stock2s.stock_status','sponsers.sponser','sponsers.sponser_start','sponsers.sponser_end','sales.on_sale','sales.new_price','sales.discounts')->orderBy('rating','DESC');
      
       if($new=='new')
        {
         $query=$query->where('stocks.created_at','>=',Carbon::now()->subdays(10));
       }
       if($top=='top')
       {
        $query=$query->where('rating','>','4');
       }
       if($drop)
       {
        $query=$query->where('stocks.drop_id',$drop);
       }
       if($id)
       {
        $query=$query->where('stocks.user_id',$id);
       }
       if($promote=='prom')
       {
        $query=$query->where([
          ['sponser','1'],
          ['sponser_end','>',$time]
         ]);
       }
       $product=$query->get();
        foreach($product as $st)
        {
         $st->image=Image::where('image_id',$st['id'])->take(1)->get();
        
       }
       return $product;
     }
     

 }
?>