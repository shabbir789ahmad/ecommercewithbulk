<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Vendor;
use App\Models\Follower;

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
      
      $banners=Banner::banners();
      $date=$this->carbon();
      $vendorsale=[];
      // dd($vendor);
      $coupon=Coupon::where('vendor_id',$id)->where('exp_date','>',$date)->where('coupon_status','1')->take(3)->get();
      
      if(Auth::id())
      {
        $follower=Follower::where('user_id',Auth::id())->where('vendor_id',$id)->first();
      }else{
        $follower=0;
      }
      //dd($products);
      return view('store',compact('products','follower','date','banners','vendorsale','coupon','id'));
     }

    
   function allStore()
   {
      $stores=Vendor::withCount('products')->withCount('followers')->limit(100)->get()->toArray();

      return view('all_store',compact('stores'));

   }
    

   
}
