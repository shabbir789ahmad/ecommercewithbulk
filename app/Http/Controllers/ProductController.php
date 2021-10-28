<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Dropdown;
use App\Models\Color;
use App\Models\Size;
use App\Models\Store;
use App\Models\Stock;
use App\Models\Stock2;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

 
 public function subCategory2($id) 
   {        
     $sub = DB::table("submenues")->where('menue_id',$id)
     ->pluck("smenue","id");
     return response()->json($sub);
   }
  public function dropCat($id) 
   {        
      $drop = DB::table("dropdowns")->where('dropdown_id',$id)->pluck("name","id");
     return response()->json($drop);
    }





  //function for product detail 
  function productDetail($id,$drop_id)
  {
    $detail= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id')
     ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id')->orderBy('rating','DESC')
        ->where('drop_id',$drop_id)
        ->findorfail($id);
     
   $stock2=Stock2::where('stock_id',$id)->where('stock_status','1')->first();
    $image=Image::where('image_id',$id)->get();
    
    $detail2= Stock::
     leftjoin('reviews','stocks.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'stocks.id','stocks.product','stocks.created_at','stocks.drop_id')
        ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.drop_id')->orderBy('rating','DESC')
         ->where('stocks.drop_id',$drop_id)
        ->where('stocks.id',$id)->get();
        foreach($detail2 as $dt)
        {
          $dt->image=Image::where('image_id',$dt->id)->take(1)->get();
         $dt->stock2=Stock2::where('stock_id',$dt->id)
           ->where('stock_status','1')->take(1)->get();
        }

        $color= Stock::
        join('colors','stocks.id','=','colors.filter_id')
        ->where('filter_id',$id)
        ->get();
        $size= Stock::
         join('sizes','stocks.id','=','sizes.size_id')
         ->where('size_id',$id)
        ->get();
        $brand= Stock::
         join('stores','stocks.id','=','stores.brand_id')
         ->where('brand_id',$id)
        ->get();
        $review= Stock::
         join('reviews','stocks.id','=','reviews.review_id')
         ->where('review_id',$id)
        ->get();
     //dd($detail2);
        return view('productpage',compact('detail','detail2','image','color','size','brand','review','stock2'));
  }  

    

  function allproduct($id, Request $req)
  {
    $sort="";
    $color="";
    $size="";
    $brand="";
    $price="";
    $min="1000";
    $max="2000";

     $now=Carbon::now();
    
    if($req->get('sort2') !== Null)
    {
        $sort=$req->get('sort2');
    }
    
     $new="";
    if($req->get('new2') !== Null)
    {
        $new=$req->get('new2');
    }
     $price="";
    if($req->get('price') !== Null)
    {
        $price=$req->get('price');
    }
   
  //echo $new;
    $query= Dropdown::leftjoin('stocks','dropdowns.id','=','stocks.drop_id')
        
        ->select('stocks.product','stocks.detail','stocks.id');

     if($req->get('color2') !== Null)
       {
        $query=$query->join('colors','stocks.id','=','colors.filter_id');
        $query=$query->where('colors.color',$req->get('color2'));
        }

     if($req->get('brand2') !== Null)
       {
          $query=$query->join('stores','stocks.id','=','stores.brand_id');
        $query=$query->where('brand',$req->get('brand2'));
        }

     if($req->get('size2') !== Null)
        {
            $query=$query->join('sizes','stocks.id','=','sizes.size_id');
        $query=$query->where('size',$req->get('size2'));
        }

        if($sort=='product')
        {
            $query=$query->orderBy('product','asc');
        }
        if($sort=='date')
        {
            $query=$query->orderBy('stocks.created_at','asc');
        }
        if($sort=='price_asc')
        {
            $query=$query->orderBy('sell_price','asc');
        }
        if($sort=='price_desc')
        {
            $query=$query->orderBy('sell_price','desc');
        }

        //sort by week and month
        
         if($new=='this')
        {
           $start = $now->startOfWeek()->format('Y-m-d H:i');
           $end = $now->endOfWeek()->format('Y-m-d H:i');
           $query=$query->whereBetween('stocks.created_at',[$start,$end]);
        }
        if($new=='last')
        {
       
           $query=$query->where('stocks.created_at','>=',Carbon::now()->subdays(15));
        }
        if($new=='month')
        {
            $query=$query->whereMonth('stocks.created_at', date('m'));
        }
   // price filter
      if($price=='10')
        {
          $query=$query->join('stock2s','stocks.id','=','stock2s.stock_id');
           $query=$query->where('sell_price','<=','10');
        }
         if($price=='20' )
        {
          $query=$query->join('stock2s','stocks.id','=','stock2s.stock_id');
           $query=$query->whereBetween('sell_price',['10','20']);
        }
         if($price=='30' )
        {
          $query=$query->join('stock2s','stocks.id','=','stock2s.stock_id');
           $query=$query->whereBetween('sell_price',['20','30']);
        }
        
         if($price=='31' )
        {
          $query=$query->join('stock2s','stocks.id','=','stock2s.stock_id');
           $query=$query->whereBetween('sell_price',['31','60']);
        }
        $query=$query->where('drop_id',$id);
        $query=$query->paginate(10);
   
     $product=$query;
 dd($product);
      foreach($product as $pro)
      {
        $pro->image=Image::where('image_id',$pro->id)->take(1)->get();
         $pro->stock2=Stock2::where('stock_id',$pro->id)
         ->where('stock_status','1')->take(1)->get();
      }
    
     $color= Stock::
        leftjoin('colors','stocks.id','=','colors.filter_id')
        ->select('stocks.drop_id','colors.color','colors.filter_id')
          ->where('drop_id',$id)
        ->get();
    $size= Stock::
       leftjoin('sizes','stocks.id','=','sizes.size_id')
       ->select('stocks.drop_id','sizes.size','sizes.size_id')
          ->where('drop_id',$id)
       ->get();

    $brand= Brand::all();
          
      
        return view('product',compact('product','color','brand','size'));
  }

 function SaleProduct (Request $req)
   {
    $sort="";
    $sell="";
    $top_sale="";
    $color="";
    $size="";
    $brand="";
    $price="";
    $min="1000";
    $max="2000";

     $now=Carbon::now();
    
    if($req->get('sort2') !== Null)
    {
        $sort=$req->get('sort2');
    }
    if($req->get('sale-product') !== Null)
    {
        $sell=$req->get('sale-product');
    }
    if($req->get('sale-rate') !== Null)
    {
        $top_sale=$req->get('sale-rate');
    }
    
     $new="";
    if($req->get('new2') !== Null)
    {
        $new=$req->get('new2');
    }
     $price="";
    if($req->get('price') !== Null)
    {
        $price=$req->get('price');
    }
   
  //echo $new;
      $query= Stock::
        leftjoin('stock2s','stocks.id','=','stock2s.stock_id')
        ->leftjoin('reviews','stocks.id','=','reviews.review_id')
        ->select('review_id', \DB::raw('avg(rating) as rating'),'stocks.id','stocks.product','stocks.created_at','stocks.detail','stocks.size_image','stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.on_sale')
       ->groupBy('review_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stocks.detail','stocks.size_image' ,'stocks.user_id','stocks.drop_id','stock2s.sell_price','stock2s.discount','stock2s.on_sale')->orderBy('rating','DESC');

     if($req->get('color2') !== Null)
       {
        $query=$query->join('colors','stocks.id','=','colors.filter_id');
        $query=$query->where('colors.color',$req->get('color2'));
        }

     if($req->get('brand2') !== Null)
       {
          $query=$query->join('stores','stocks.id','=','stores.brand_id');
        $query=$query->where('brand',$req->get('brand2'));
        }

     if($req->get('size2') !== Null)
        {
            $query=$query->join('sizes','stocks.id','=','sizes.size_id');
        $query=$query->where('size',$req->get('size2'));
        }

        if($sell=='new')
        {
          $query=$query->where('stocks.created_at','>=',Carbon::now()->subdays(10));
        }
        if($top_sale=='top')
        {
         $query=$query->where('rating','>','4');
        }
        if($sort=='product')
        {
            $query=$query->orderBy('product','asc');
        }
        if($sort=='date')
        {
            $query=$query->orderBy('stocks.created_at','asc');
        }
        if($sort=='price_asc')
        {
            $query=$query->orderBy('sell_price','asc');
        }
        if($sort=='price_desc')
        {
            $query=$query->orderBy('sell_price','desc');
        }

        //sort by week and month
        
         if($new=='this')
        {
           $start = $now->startOfWeek()->format('Y-m-d H:i');
           $end = $now->endOfWeek()->format('Y-m-d H:i');
           $query=$query->whereBetween('stocks.created_at',[$start,$end]);
        }
        if($new=='last')
        {
          $query=$query->where('stocks.created_at','>=',Carbon::now()->subdays(15));
        }
        if($new=='month')
        {
            $query=$query->whereMonth('stocks.created_at', date('m'));
        }
   // price filter
      if($price=='10')
        {
          
           $query=$query->where('sell_price','<=','10');
        }
         if($price=='20' )
        {
         
           $query=$query->whereBetween('sell_price',['10','20']);
        }
         if($price=='30' )
        {
          
           $query=$query->whereBetween('sell_price',['20','30']);
        }
        
         if($price=='31' )
        {
           $query=$query->whereBetween('sell_price',['31','60']);
        }
         $query=$query->where('on_sale','1');
        $query=$query->paginate(10);
   
     $product=$query;

      foreach($product as $pro)
      {
        $pro->image=Image::where('image_id',$pro->id)->take(1)->get();
         $pro->stock2=Stock2::where('stock_id',$pro->id)
         ->where('stock_status','1')->take(1)->get();
      }
    
     $color= Stock::
        leftjoin('colors','stocks.id','=','colors.filter_id')
        ->select('stocks.drop_id','colors.color','colors.filter_id')->get();
    $size= Stock::
       leftjoin('sizes','stocks.id','=','sizes.size_id')
       ->select('stocks.drop_id','sizes.size','sizes.size_id')
        ->get();

    $brand= Brand::all();
          
          //dd($product);
      
        return view('sale_product',compact('product','color','brand','size'));
  }

  
 

 
 
 
 
    function colorStatus(Request $req)
  {
    $color=Color::findorfail($req->id);
   $color->color_status=$req->color_status;
   $color->save();
  }
    function sizeStatus(Request $req)
  {
    $size=Size::findorfail($req->id);
   $size->size_status=$req->size_status;
   $size->save();
  }
function brandStatus(Request $req)
  {
    $store=Store::findorfail($req->id);
   $store->brand_status=$req->brand_status;
   $store->save();
  }
  function stockStatus(Request $req)
  {
    $store=Stock2::findorfail($req->id);
   $store->stock_status=$req->stock_status;
   $store->save();
  }
  function productStatus(Request $req)
  {
    $store=Stock::findorfail($req->id);
   $store->product_status=$req->product_status;
   $store->save();
  }
}
