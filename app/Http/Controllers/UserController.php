<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class UserController extends Controller
{
    function order()
    {
        $order=Order::join('details','orders.id','=','details.order_id')
        ->select('orders.id','orders.name','orders.email','orders.payment','details.product','details.price','details.total','details.image','details.quentity')
        ->where('user_id',Auth::user()->id)
        ->get();
        //dd($order);
        return view('User.user_board',compact('order'));
    }
    function track($id)
    {
     $order=Order::join('details','orders.id','=','details.order_id')
        ->findorfail($id);
        //dd($order);
         return view('User.order_tracking',compact('order'));
    }
}
