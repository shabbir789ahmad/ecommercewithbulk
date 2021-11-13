<?php
namespace App\Http\Traits;
use App\Models\Vendor;
use App\Models\Coupon;
trait CouponTrait{

  function getCoupon()
  {
    
    $store=Vendor::
        select('vendors.store_name','vendors.image','vendors.id')
        ->paginate(20);
        foreach($store as $st)
        {
          $st->coupon=Coupon::where('vendor_id',$st['id'])->latest()->take(1)->get();
        }
        return $store;

  }
 }
?>