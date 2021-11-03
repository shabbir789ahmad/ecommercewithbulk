<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Dropdown;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Category;
use App\Mail\OrderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Http\Traits\OrderTrait;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
  use OrderTrait;
  
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
       //dd($req->vendor_id);
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
          'product_id' =>  $req->pid[$i],
          'vendor_id'=> $req->vendor_id[$i],
          'drop_id'=> $req->drop_id[$i],
          'order_status'=> 'Pending',
          'order_id'=> $order->id,
           'total' => $req->total,
        ]);
       }

    if($data)
    {
      $quen=Stock2::where('id',$data['product_id'])->increment('sold_stock');
      $quen=Stock2::where('id',$data['product_id'])->decrement('stock');
      $req->session()->forget('cart');
    }
          
   });

     return view('shopping');
    }else{
        return redirect()->route('login')->with('message','Please Login First');
      }
      
    }

    function orderConform($order, $detail)
    {
      Mail::to($order->email)->send(new OrderMail($order,$detail));
    }

    function getOrder(Request $req)
    {
      $order=$this->orders();
      $counter="";
        if($req->get('counte')!== null)
         {
          $counter=$req->get('counte');
         }
       $query2=Order::join('details','orders.id','=','details.order_id')->whereMonth('details.created_at', date('m'))->where('order_status','!=','delivered');
       if($counter=='this')
       {
         $start = $now->startOfWeek()->format('Y-m-d H:i');
         $end = $now->endOfWeek()->format('Y-m-d H:i');
         $query2=$query2->whereBetween('details.created_at',[$start,$end]);
       }
       if($counter=='mid')
       {
        $query2=$query2->where('details.created_at','>=',$now->subdays(15));
       }
       if($counter=='month')
        {
            $query2=$query2->whereMonth('details.created_at', date('m'));
        }
       $today=$query2->count();
       //dd($now);
      $query=Order::join('details','orders.id','=','details.order_id')
       ->whereMonth('orders.created_at', date('m'))->where('order_status','delivered')->where('user_id',Auth::user()->id);
     
       if($counter=='this')
       {
         $start = $now->startOfWeek()->format('Y-m-d H:i');
         $end = $now->endOfWeek()->format('Y-m-d H:i');
         $query=$query->whereBetween('details.created_at',[$start,$end]);
       }
       if($counter=='mid')
       {
         $query=$query->where('details.created_at','>=',$now->subdays(15));
       }
       if($counter=='month')
        {
          $query=$query->whereMonth('details.created_at', date('m'));
        }

      $this_month=$query->count();
      $pending=$query2
      ->where('order_status','pending')->where('user_id',Auth::user()->id)
      ->count();

      $query=Order::join('details','orders.id','=','details.order_id')->where('user_id',Auth::user()->id)
      ->onlyTrashed();
      if($counter=='this')
       {
         $start = $now->startOfWeek()->format('Y-m-d H:i');
         $end = $now->endOfWeek()->format('Y-m-d H:i');
         $query=$query->whereBetween('details.created_at',[$start,$end]);
       }
       if($counter=='mid')
       {
        $query=$query->where('details.created_at','>=',$now->subdays(15));
       }
       if($counter=='month')
        {
            $query=$query->whereMonth('details.created_at', date('m'));
        }

      $cancel=$query->count();
      $cat=Category::all();
      //dd($cancel);
      return view('vendor.order_show',compact('order','today','pending','this_month','cancel','cat'));
    }

   function delivered()
    {
      $order=$this->orders();
  
      return view('vendor.order_deliver',compact('order'));
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
      return view('vendor.order_detail',compact('order','drop'));
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
      return view('vendor.order_cancel',compact('order'));
    }
    function restoreOrder($id)
    {
      $order=Order::
      withTrashed()->
      findorfail($id)->restore();
      return redirect()->back()->with('success','Order Restored');
    }

}
