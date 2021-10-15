<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Dropdown;
use App\Models\Stock;
use App\Models\Category;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

  function check()
  {
    if(Auth::user())

    {
      return view('checkout');
    }else
    {
      return redirect()->back()->with('message','Please Login First');
    }
  }
    function order(Request $req)
    {

        $req->validate([
          'name' =>'required',
          'email' =>'required',
          'phone' =>'required',
          'address' =>'required',
          'country' =>'required',
          'city' =>'required',
          'post_code' =>'required',
          'payment' =>'required',
          'product' =>'required',
          'image' =>'required',
          
        ]);
        if(Auth::user())
        {
        DB::Transaction(function() use($req)
        {
          
         $order=Order::create([
         'name' => $req->name,
         'email' =>  $req->email,
         'address' =>  $req->address,
         'phone' =>  $req->phone,
         'country' =>  $req->country,
         'city' =>  $req->city,
        
         'zip' =>  $req->post_code,
         'payment' =>  $req->payment,
          'user_id' =>  Auth::user()->id,
       ]);

       $count=sizeof($req->product);
       for($i=0; $i < $count; $i++)
       {

        $data=Detail::create([
          'product'=> $req->product[$i],
          'image'=> $req->image[$i],
          'price'=> $req->price[$i],
          'quentity'=> $req->quentity[$i],
          'detail'=> $req->detail[$i],
           'color' =>  $req->color[$i],
         'size' =>  $req->size[$i],
          'drop_id'=> $req->drop_id[$i],
          'order_status'=> 'Pending',
          'order_id'=> $order->id,
           'total' => $req->total,
        ]);
       }

         if($data)
         {
            $req->session()->forget('cart');
            
         }
          $this->orderConform($order,$data);
        });

        return view('shopping');
      }else{
        return redirect()->route('logn')->with('message','Please Login First');
      }
      
    }

    function orderConform($order, $detail)
    {
      Mail::to($order->email)->send(new OrderMail($order,$detail));
    }

    function getOrder(Request $req)
    {
      
      $stat="";
      if($req->get('status'))
      {
        $stat=$req->get('status');
      }
     // echo $stat;
     
      $query=Order::join('details','orders.id','=','details.order_id')
      ->select('orders.id','details.product','details.image','details.price','details.quentity','details.order_status','orders.payment','details.total');

     
       if($req->get('drop') !== Null)
       {
        $query=$query->where('details.drop_id',$req->get('drop'));
        }
        if($stat =='Shipped')
       {
        $query=$query->where('order_status','shipped');
        }
         if($stat =='Pending')
       {
        $query=$query->where('order_status','pending');
        }
         if($stat =='Enroute')
       {
        $query=$query->where('order_status','enroute');
        }
       
       $query=$query->where('order_status','!=','delivered');
       $query=$query->withoutTrashed();
      $query=$query->paginate(10);

   $order=$query;
    //dd($order);
       $query2=Order::join('details','orders.id','=','details.order_id');
       $today=$query2->whereDay('orders.created_at', date('d'))
      ->count();
      $this_month=Order::join('details','orders.id','=','details.order_id')
       ->whereMonth('orders.created_at', date('m'))
      ->count();
      $pending=$query2
      ->where('order_status','pending')
      ->count();
       $cancel=Order::join('details','orders.id','=','details.order_id')
      ->onlyTrashed()
      ->count();
      $cat=Category::all();
      //dd($cancel);
      return view('Dashboard.order_show',compact('order','today','pending','this_month','cancel','cat'));
    }

   function delivered()
    {
      $order=Order::
      join('details','orders.id','=','details.order_id')
      ->where('order_status','delivered')->paginate(10);
     
      return view('Dashboard.order_deliver',compact('order'));
    }
   
    function cancelOrder($id)
    {
       $order=Order::join('details','orders.id','=','details.order_id')->findorfail($id);

       $order->delete();
       return redirect()->back()->with('success','Order Canceled');
    }
    function showOrder($id)
    {
      $order=Order::
      join('details','orders.id','=','details.order_id')
      ->findorfail($id);
      $drop=Dropdown::where('id',$order->drop_id)->get();
     // dd($drop);
      return view('Dashboard.order_detail',compact('order','drop'));
    }

    function statusUp(Request $req)
    {
      $order=Detail::findorfail($req->order_id);
      $order->order_status=$req->order_status;

      $order->save();
      return redirect()->back()->with('success','Status Updated');
    }

    function deletedOrder()
    {
      $order=Order::
      join('details','orders.id','=','details.order_id')
      ->onlyTrashed()->paginate();
       //dd($order);
      return view('Dashboard.order_cancel',compact('order'));
    }
    function restoreOrder($id)
    {
      $order=Order::
      withTrashed()->
      findorfail($id)->restore();
      return redirect()->back()->with('success','Order Restored');
    }

}
