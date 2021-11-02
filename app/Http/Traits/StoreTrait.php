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
use App\Models\Sponser;
use App\Models\Supply;
use Carbon\Carbon;
use Auth;
 trait StoreTrait {
     public function carbon()
     {
       $time=Carbon::now();
        return $time;;
     }
     public function dropdown()
     {
       $drop=Dropdown::all();
       return $drop;
     }
     public function category()
     {
       $cat=Category::all();
       return $cat;
     }
      public function supply()
     {
       $sup=Supply::all();
       return $sup;
     }
     function sale()
     {
      $time=Carbon::now();
      $sale=Sell::where('sell_status','1')->where('end_time','>',$time)->where('start_time','<=',$time)->latest()->take(1)->get();
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

     
     function products($id)
     {
      $req = app('request');
       $supply2='';
         $stock2='';
         if($req->get('supply')!== Null)
         {
            $supply2=$req->get('supply');
         }
         if($req->get('stock1') !== Null)
         {
            $stock2=$req->get('stock1');
         }
         $drop2='';
    
     if($req->get('drop_category') !== Null)

     {
        $drop2=$req->get('drop_category');
     }
         //echo $stock2;
       $query=Stock::
         join('stock2s','stocks.id','=','stock2s.stock_id')
        ->select('stocks.product','stocks.detail','stocks.drop_id','stocks.product_status','stocks.id','stocks.user_id','stock2s.supply_id','stock2s.stock','stock2s.sell_price','stock2s.discount','stock2s.price','stock2s.sold_stock');

         if($supply2)
         {
          
            $query=$query->where('stock2s.supply_id',$supply2);
         }
         if($drop2)
        {
         $query=$query->where('stocks.drop_id', $drop2);
        }

          if($stock2 == '10' )
         {
            $query=$query->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == '20' )
         {
          $query=$query->where('stock2s.stock','>=','10')
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == '30' )
         {
            
            $query=$query->where('stock2s.stock','>=','20')
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == '40' )
         {
            
            $query=$query->where('stock2s.stock','>=','30')
            ->where('stock2s.stock','<=',$stock2);
            
         }
         if($stock2 == '50' )
         {
            $query=$query->where('stock2s.stock','>=','40')
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == '60' )
         {
            
            $query=$query->where('stock2s.stock','>=','50');
            
         }
        
        if($id)
        {
          $query=$query->where('user_id',$id);
        }
        $query=$query->paginate(10);
        $stock=$query;
        foreach($stock as $st)
        {
         $st->image=Image::where('image_id',$st->id)->take(1)->get();
         $st->sponser=Sponser::where('sponser_id',$st->id)->get();

        }

        return $stock;
        
     }

 }

?>