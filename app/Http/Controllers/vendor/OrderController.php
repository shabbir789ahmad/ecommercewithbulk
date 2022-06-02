<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\classes\OrderClass;
use App\Models\Order;
use Auth;
class OrderController extends Controller
{
    protected $order;
    function __construct( OrderClass $order)
    {
        $this->order=$order;
    }

    function index(OrderClass $order)
    {  
        $orders=$this->order->orders($user_id='',Auth::id());
        
        return view('vendor.orders.index',compact('orders'));
    }

    function delivered(OrderClass $order)
    {  
        $orders=$this->order->orders($user_id='',Auth::id());
        
        return view('vendor.orders.delivered',compact('orders'));
    }

    function orderDetail($id)
    {
      $order=$this->order->orderDetails($id);
         // dd($order);
        return view('vendor.orders.detail',compact('order'));
    }

    function update(Request $request)
    {
        $order=Order::where('id',$request->id)->update([
 
          'order_status'=>$request->order_status,
        ]);

        return redirect()->back();
    }


    function destroy($id)
    {
        $this->order->delete($id);
        return redirect()->back();
    }
}
