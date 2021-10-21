<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Image;
use App\Models\Stock2;
use App\Models\Banner;
use Auth;
use Illuminate\Support\Facades\DB;
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
        $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
     }
     $storenew= Stock::
       leftjoin('reviews','stocks.id','=','reviews.review_id')
       ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id')->orderBy('rating','DESC')
       ->where('stocks.user_id',$id)
       ->whereMonth('stocks.created_at',date('m'))->get();
      foreach($storenew as $st)
      {
        $st->image=Image::where('image_id',$st['id'])->take(1)->get();
        $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
      }

     $banner=Banner::latest()->take(1)->get();
     return view('store',compact('store','storenew','banner'));
    }

    function getStore()
    {
        $store= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id')
     ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id')->orderBy('rating','DESC')
     ->where('stocks.user_id',Auth::user()->id)->get();
     foreach($store as $st)
     {
        $st->image=Image::where('image_id',$st['id'])->take(1)->get();
        $st->stock=Stock2::where('stock_id',$st['id'])->take(1)->get();
     }
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

     $banner=Banner::latest()->take(1)->get();
     return view('vendor.view_store',compact('store','storenew','banner'));

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
}
