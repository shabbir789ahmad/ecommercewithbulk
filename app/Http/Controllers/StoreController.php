<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Image;
use App\Models\Stock2;
use App\Models\Sell;
use App\Models\Banner;
use App\Http\Traits\StoreTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    use StoreTrait;

    
    function showStore($id, Request $req)
    {
       $new="";
        $top="";
        $drop="";
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
       $date=Carbon::now();
       $query= Stock::
        leftjoin('reviews','stocks.id','=','reviews.review_id')
        ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id','stocks.drop_id')->orderBy('rating','DESC');
      
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

       $query=$query->where('stocks.user_id',$id)
       ->get();
       $product=$query;
        foreach($product as $st)
        {
         $st->image=Image::where('image_id',$st['id'])->take(1)->get();
         $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
       }
      $sale=$this->sale();
        
        $banner=$this->banner();
      return view('store',compact('product','sale','date','banner'));
       
     
    }

    function getStore(Request $req)
    {
       $new="";
        $top="";
        $drop="";
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
       $date=Carbon::now();
       $query= Stock::
        leftjoin('stock2s','stocks.id','=','stock2s.stock_id')
        ->leftjoin('reviews','stocks.id','=','reviews.review_id')
        ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.on_sale')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.on_sale')->orderBy('rating','DESC');
      
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

       $query=$query->where('stocks.user_id',Auth::user()->id)
       ->get();
       $product=$query;
        foreach($product as $st)
        {
         $st->image=Image::where('image_id',$st['id'])->take(1)->get();
         $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
       }
      $sale=$this->sale();
        
        $banner=$this->banner();
      return view('vendor.sale_product',compact('product','sale','date','banner'));
       

    }

     function upoloadBanner(Request $req)
     {
      $req->validate([
        'banner'=>'required',
        'heading1'=>'required',
        'heading2'=>'required',

      ]);
      $store=New Banner;
      if($req->hasfile('banner'))
      {
         $file=$req->file('banner');
         $ext=$file->getClientOriginalExtension();
         $filename=time().rand(1,1000).'.'.$ext;
         $file->move('uploads/img/' ,$filename);
         $store->banner=$filename;
      }
      $store->heading1=$req->heading1;
      $store->heading2=$req->heading2;
          //dd($store);
      $store->save();

      return redirect()->back()->with('success','Store Banner Uploaded');
     }
     function getbanner()
     {
      $banner=Banner::all();
      return view('vendor.get_banner',compact('banner'));
     }
     function deletebanner($id)
     {
      $banner=Banner::findorfail($id);
     $banner->delete();
     return redirect()->back()->with('success','banner Deleted');
     }

     function updatebanner(Request $req)
     {
      $banner=Banner::findorfail($req->id);

      if($req->hasfile('banner'))
      {
         $file=$req->file('banner');
         $ext=$file->getClientOriginalExtension();
         $filename=time().rand(1,1000).'.'.$ext;
         $file->move('uploads/img/' ,$filename);
         $banner->banner=$filename;
      }
      $banner->heading1=$req->heading1;
      $banner->heading2=$req->heading2;

      //dd($banner);
      $banner->save();
      
      return redirect()->back()->with('success','Store Banner Updated');
     }

     function onSale(Request $req)
     {
          $sale=Stock2::findorfail($req->id);
          $sale->sell_id=$req->sell_id;
          $sale->sell_price=$req->sell_price;
          $sale->discount=$req->discount;
          $sale->on_sale='1';
          $sale->save();
          return redirect()->back()->with('success','your product is on sale');
        
    }
     function outSale(Request $req)
    {
        $sale=Stock2::findorfail($req->id);
          
           $sale->sell_id='0';
           $sale->sell_price=$req->sell_price;
           $sale->discount=$req->discount;
           $sale->on_sale='0';
           $sale->save();
           $req->session()->flash('success','your product is Out Sale');
           return redirect()->back();
        
    }
}
