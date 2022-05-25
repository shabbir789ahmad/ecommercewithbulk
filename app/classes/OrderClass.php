<?php
namespace App\classes;

use App\Models\Order;
use App\Models\User;
class OrderClass{


  function orders($user_id,$vendor_id)
  {
  	$query=Order::
        join('order_details','orders.id','=','order_details.order_id')
        
        ->select('order_details.product_name','orders.id','orders.state','orders.city','orders.address','order_details.quentity','order_details.sub_total','order_details.ship','order_details.color','order_details.size','order_details.image');

      if($user_id)
      {
      	$query=$query->where('user_id',$user_id);
      }

      if($vendor_id)
      {
      	$query=$query->where('order_details.vendor_id',$vendor_id);
      }

        
        return $orders=$query->get();
  }



  function orderDetails($id)
  {
    return Order::with('orders')
         ->join('users','users.id','=','orders.user_id')
       
       ->select('orders.id','orders.state','orders.city','orders.address','users.name','users.email','users.phone','orders.created_at','orders.payment_status')
        ->where('orders.id',$id)
        ->first();
  }



}
?>