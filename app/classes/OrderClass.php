<?php
namespace App\classes;

use App\Models\Order;
use App\Models\User;
use DB;
class OrderClass{


  function orders($user_id,$vendor_id)
  {
  	$query=Order::
           join('order_details','orders.id','=','order_details.order_id')
          ->join('users','users.id','=','orders.user_id')
          ->select('order_details.order_id',\DB::raw('SUM(quentity) as quentity'),\DB::raw('SUM(sub_total) as total' ),'users.name','orders.order_status','users.image','orders.updated_at','users.phone','users.email')
          ->groupBy('order_details.order_id','users.name','orders.order_status','users.image','orders.updated_at','users.phone','users.email')
          ->where('orders.order_status','!=','Delivered');


              

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


  function delete($id)
  {
        Order::destroy($id);
        
  }

   function find($id)
   {
        return Order::findorfail($id);
        
   }



}
?>