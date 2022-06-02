<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Jobs\SendOrderEmailJob;
use App\Models\Order;
use App\Models\OrderDetail;
use App\classes\OrderClass;
use Auth;
class OrderController extends Controller
{

  function index()
    {
      $address=UserAddress::where('user_id',Auth::id())->first();
      return view('checkout',compact('address'));
    }

    function Order(Request $request)
    {
      $product=[];
      $request->validate([
         
          'state'=>'required',
          'city'=>'required',
          'address'=>'required',
      ]);
      
      if(session()->get('cart'))
     {
      $order=Order::create([

       'state'=>$request->state,
       'city'=>$request->city,
       'address'=>$request->address,
       'payment_status'=>$request->payment_status,
       'order_status'=>'recieved',
       'user_id'=>Auth::id(),
      ]);

     
      foreach(session()->get('cart') as $cart)
      {
        OrderDetail::create([

       'product_name'=>$cart['name'],
       'quentity'=>$cart['quantity'],
       'sub_total'=>$cart['sub_total'],
       'ship'=>$cart['shipping_cost'],
       'color'=>$cart['color']??null,
       'size'=>$cart['size']??null,
       'image'=>$cart['image']??null,
       'product_id'=>$cart['id'],
       'vendor_id'=>$cart['vendor_id'],
       'order_id'=>$order->id,
       
      ]);
      $total=$cart['sub_total'] + $cart['shipping_cost'];
      $product=[
         'name'=>$cart['name'],
         'price'=>$cart['price'],
         'image'=>$cart['image'],
         'sub_total'=>$cart['sub_total'],
      ];
       }
     }

      $user=[
        'email'=>Auth::user()->email,
        'name'=>Auth::user()->name,
        'final_total'=>$total,
        'address'=>$request->state.$request->city.$request->address,
      ];
 

     dispatch(new SendOrderEmailJob($user,$product));
     session()->forget('cart'); 
      return redirect()->route('shopping');
    }


    /* 
    * show order to user
    */
    
    function userOrder()
    {   $order=new OrderClass;
        $orders=$order->orders(Auth::id(),$vendor_id='');
        //dd($orders);
        return view('User.user_orders',compact('orders'));
    }

   /* 
    * user track order
    */
     function track($id)
    {
     $order=Order::join('order_details','orders.id','=','order_details.order_id')
        ->findorfail($id);
        //dd($order);
         return view('User.order_tracking',compact('order'));
    }
}
