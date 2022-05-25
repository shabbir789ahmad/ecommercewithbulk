<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\classes\OrderClass;
use Auth;
class OrderController extends Controller
{
    protected $order;
    function __construct( OrderClass $order)
    {
        $this->order=$order;
    }

    function index()
    {  
        $orders=$this->order->orders($user_id='',Auth::id());
        
        return view('vendor.orders.index',compact('orders'));
    }

    function orderDetail($id)
    {
      $order=$this->order->orderDetails($id);
        // dd($orders);
        return view('vendor.orders.detail',compact('order'));
    }
}
