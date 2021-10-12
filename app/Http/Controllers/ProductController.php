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
  function productDetail($id)
  {
    $detail= Product::
         leftjoin('reviews','products.id','=','reviews.review_id')
        
        ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.price','products.sell_price','reviews.review_id','products.created_at','products.detail')
        ->groupBy('review_id','products.id','products.name','products.discount','products.sell_price','products.price','reviews.review_id','products.created_at','products.detail')->orderBy('rating','DESC')
        ->findorfail($id);

    $image=Image::where('image_id',$id)->get();
    // dd($detail);
      
     $detail2= Product::
     leftjoin('reviews','products.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.sell_price','products.price','reviews.review_id','products.created_at')
        ->groupBy('review_id','products.id','products.name','products.discount','products.sell_price','products.price','reviews.review_id','products.created_at')->orderBy('rating','DESC')
        ->get();
        foreach($detail2 as $dt)
        {
            $dt->image=Image::where('image_id',$dt->id)->take(1)->get();
        }

        $color= Product::
        join('colors','products.id','=','colors.filter_id')
        ->where('filter_id',$id)
        ->get();
        $size= Product::
         join('sizes','products.id','=','sizes.size_id')
         ->where('size_id',$id)
        ->get();
        $brand= Product::
         join('stores','products.id','=','stores.brand_id')
         ->where('brand_id',$id)
        ->get();
        $review= Product::
         join('reviews','products.id','=','reviews.review_id')
         ->where('review_id',$id)
        ->get();

        return view('productpage',compact('detail','detail2','image','color','size','brand','review'));
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
    $query= Dropdown::leftjoin('products','dropdowns.id','=','products.drop_id')
        
        ->select('products.name','products.detail','products.price','products.discount','products.sell_price','products.id');

     if($req->get('color2') !== Null)
       {
        $query=$query->join('colors','products.id','=','colors.filter_id');
        $query=$query->where('colors.color',$req->get('color2'));
        }

     if($req->get('brand2') !== Null)
       {
          $query=$query->join('stores','products.id','=','stores.brand_id');
        $query=$query->where('brand',$req->get('brand2'));
        }

     if($req->get('size2') !== Null)
        {
            $query=$query->join('sizes','products.id','=','sizes.size_id');
        $query=$query->where('size',$req->get('size2'));
        }

        if($sort=='name')
        {
            $query=$query->orderBy('name','asc');
        }
        if($sort=='date')
        {
            $query=$query->orderBy('products.created_at','asc');
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
           $query=$query->whereBetween('products.created_at',[$start,$end]);
        }
        if($new=='last')
        {
       
           $query=$query->where('products.created_at','>=',Carbon::now()->subdays(15));
        }
        if($new=='month')
        {
            $query=$query->whereMonth('products.created_at', date('m'));
        }
   // price filter
      if($price=='1000')
        {
       
           $query=$query->where('products.sell_price','<=','1000');
        }
         if($price=='2000' )
        {
       
           $query=$query->whereBetween('products.sell_price',['1000','2000']);
        }
         if($price=='3000' )
        {
       
           $query=$query->whereBetween('products.sell_price',['2000','3000']);
        }
        
         if($price=='3100' )
        {
       
           $query=$query->whereBetween('products.sell_price',['3100','6000']);
        }
        $query=$query->where('drop_id',$id);
        $query=$query->paginate(10);
   
     $product=$query;
 //dd($product);
      foreach($product as $pro)
      {
        $pro->image=Image::where('image_id',$pro->id)->take(1)->get();
      }
    
     $color= Product::
        leftjoin('colors','products.id','=','colors.filter_id')
        ->select('products.drop_id','colors.color','colors.filter_id')
          ->where('drop_id',$id)
        ->get();
    $size= Product::
       leftjoin('sizes','products.id','=','sizes.size_id')
       ->select('products.drop_id','sizes.size','sizes.size_id')
          ->where('drop_id',$id)
       ->get();

    $brand= Brand::all();
          
         //dd($size);
      
        return view('product',compact('product','color','brand','size'));
  }


  
 

  function stockM( $id)
  {
     $stock=Product::findorfail($id);
     return view('Dashboard.stock_module',compact('stock'));
  }
  function discountUp(Request $req)
  {
    $product=Product::findorfail($req->id);
    $product->discount=$req->discount;
    $product->save();
    return redirect()->back()->with('success','Discount Updated');
  }
  function deleteProduct($id)
   {
    $product=Product::findorfail($id);
    $product->delete();

    return redirect()->back()->with('success','Product Deleted Permanently');
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
}
