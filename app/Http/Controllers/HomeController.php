<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Review;
use App\Models\Size;
use App\Models\ProductBrand;
// use App\Models\ProductSize;
// use App\Models\ProductColor;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\CouponTrait;
class HomeController extends Controller
{

    use ProductTrait;
    function index()
    {
        $slider=Slider::latest()->take('3')->get();
        $sells=[];
        $sell=[];
        $subcategories=SubCategory::all();
        $dropdown=[];
        $products=$this->products($id='',$subcategory_id='');
       
       return view('home',compact('slider','sells','products','sell','subcategories','dropdown'));
    }


   function productDetail($id)
  {
    
    $product_detail=$this->detail($id);

    $products=$this->products($vendor_id='',$product_detail['subcategory_id']);
   
    //$brand= ProductBrand::where('product_id',$id)->get();
    //$review= Review::where('product_id',$id)->get();
    // $coupon=Coupon::where('vendor_id',$detail->user_id)->latest()->take('2')->get();
    $coupon=[];
    
    return view('product_detail',compact('product_detail','products','coupon'));
  } 


function allProductBySubCategory($id, Request $req)
  {
   
    $products=$this->products($vendor_id='',$id);
    $brand=[];
    $colors=Color::all();
    $sizes=Size::all();
  
      // dd($products);
    return view('product',compact('products','brand','colors','sizes'));
  }






     function search(Request $req)
  {
     try {
        $search=$req->search;
    $search2=Stock::join('stock2s','stocks.id','=','stock2s.stock_id')
    ->where('product','LIKE',"%{$search}%")->get();
    foreach($search2 as $search)
     {
      $search->image=Image::where('image_id',$search['id'])->take(1)->get();
      
     }
    } catch (\Exception $e) {
        return redirect()->back()->withError('Not data Found for Search ' . $request->input('search'))->withInput();
    }
    
 
    return view('search',compact('search2'));
  }
}
