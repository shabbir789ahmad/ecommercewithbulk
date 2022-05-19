<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\vendor;
use App\Models\Color;
use App\Models\Review;
use App\Models\Size;
use App\Models\ProductBrand;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\CouponTrait;
use App\Http\Traits\ImageTrait;
class HomeController extends Controller
{

    use ProductTrait;
    function index()
    {
        $slider=Slider::latest()->take('3')->get();
        $sells=[];
        $sell=[];
        $stores=Vendor::all();
        $dropdown=[];
        $products=$this->products($id='',$category_id='');
       
       return view('home',compact('slider','sells','products','sell','stores','dropdown'));
    }


   function productDetail($id)
  {
    
    $product_detail=$this->detail($id);

    $products=$this->products($vendor_id='',$product_detail['subcategory_id']);
    
    $color= Color::where('product_id',$id)->get();
    $size= Size::where('product_id',$id)->get();
    $brand= ProductBrand::where('product_id',$id)->get();
    $review= Review::where('product_id',$id)->get();
    // $coupon=Coupon::where('vendor_id',$detail->user_id)->latest()->take('2')->get();
    $coupon=[];
    
    return view('product_detail',compact('product_detail','products','color','size','brand','review','coupon'));
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
