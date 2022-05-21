<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Image;
use App\Models\Stock2;
use App\Models\Sell;
use App\Models\Sale;
use App\Models\Coupon;
use App\Models\Follow;
use App\Models\CouponSave;
use App\Models\VendorSale;
use App\Models\Banner;
use App\Http\Traits\StoreTrait;
use App\Http\Traits\ProductTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    use StoreTrait;
    use ProductTrait;

    
    function showStore($id)
    {
       
      $products=$this->products($id,$subcategory_id='');
      $sale=[];
      $banners=Banner::banners();
      $date=$this->carbon();
      $vendorsale=[];
      $coupon=Coupon::where('vendor_id',$id)->where('exp_date','>',$date)->where('coupon_status','1')->take(3)->get();
      
      
      //dd($products);
      return view('store',compact('products','sale','date','banners','vendorsale','coupon'));
     }

    

    

     function onSale(Request $req)
     {
          $sale=new Sale;
          $sale->sell_id=$req->sell_id;
          $sale->sale_id=$req->sale_id;
          $sale->new_price=$req->new_price;
          $sale->discounts=$req->discounts;
          $sale->on_sale='1';
          $sale->save();
          return redirect()->back()->with('success','your product is on sale');
        
    }
    function vendorOnSale(Request $req)
     {
          $sale=new VendorSale;
          $sale->vendor_sell_id=$req->vendor_sell_id;
          $sale->vendor_sale_id=$req->vendor_sale_id;
          $sale->vendor_new_price=$req->vendor_new_price;
          $sale->vendor_discount=$req->vendor_discount;
          $sale->vendor_on_sale='1';
          $sale->save();
          return redirect()->back()->with('success','your product is on sale');
        
    }

    function outSale($id,Request $req)
    {
      $sale=Sale::where('sale_id',$id)->delete();
      $req->session()->flash('success','your product is Out Sale');
     return redirect()->back();
    }
    
    function vendorOutSale($id,Request $req)
    {
      $sale=VendorSale::where('vendor_sale_id',$id)->delete();
      $req->session()->flash('success','your product is Out Sale');
     return redirect()->back();
    }
}
