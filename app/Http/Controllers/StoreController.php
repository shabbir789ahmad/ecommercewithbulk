<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Vendor;


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

    
   function allStore()
   {
      $stores=Vendor::all();
      return view('all_store',compact('stores'));

   }
    

   
}
