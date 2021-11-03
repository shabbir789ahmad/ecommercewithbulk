<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Contact;
use App\Models\Stock;
use App\Models\Sell;
use App\Models\Stock2;
use App\Notifications\ProductStock;
use Notification;
use App\Http\Traits\StoreTrait;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
class CountController extends Controller
{
    use StoreTrait;
    function count(Request $req)
    {    
        $now=Carbon::now();
        $from='';
        $tos='';
        $counter='';
        if($req->get('from') !== Null)
        { 
            $from=$req->get('from');
        }
        if($req->get('to') !== Null)
        { 
            $tos=$req->get('to');
        }
        echo $tos;
        $query=Order::join('details','orders.id','=','details.order_id')->whereMonth('orders.created_at',date('m'))->where('details.order_status','delivered')->where('user_id',Auth::user()->id);
        
        if($from && $tos)
        {
         
          $query=$query->whereBetween('details.updated_at',[$from,$tos]);
        }
        

        $comp=$query->count();
        //dd($comp);
        if($comp)
        {
        $comp2=Order::where('user_id',Auth::user()->id)->count();
        $com=$comp/$comp2 * 100;
        }else{
            $com=0;
        }
        
        
      $query=Order::whereMonth('created_at', date('m'))->where('user_id',Auth::user()->id);
       
        if($from && $tos)
        {
         
          $query=$query->whereBetween('orders.created_at',[$from,$tos]);
        }
      $order=$query->count();
       //dd($order);
        if($order)
        {
        $order2=Order::where('user_id',Auth::user()->id)->count();
        $or=$order/$order2 * 100;
        }else{
            $or=0;
        }

        $query=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','pending')
        ->whereMonth('orders.created_at', date('m'))->where('user_id',Auth::user()->id);
        if($from && $tos)
        {
         
          $query=$query->whereBetween('orders.created_at',[$from,$tos]);
        }
        $sale=$query->count();
        // dd($sale);
        if($sale)
        {
        $sale2=Order::
        join('details','orders.id','=','details.order_id')
        ->where('user_id',Auth::user()->id)->count();
        $sl=$sale/$sale2 * 100;
        }else{
            $sl=0;
        }
        
        $query=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')
        ->whereMonth('orders.created_at', date('m'))->where('user_id',Auth::user()->id);
         
          if($from && $tos)
        {
         
          $query=$query->whereBetween('details.updated_at',[$from,$tos]);
        }

        $earn=$query->sum('price');

       
      $earn3= Order::
        join('details','orders.id','=','details.order_id')
        ->whereMonth('orders.created_at', date('m'))->where('user_id',Auth::user()->id)->count();
         
         if($earn)
        {
        $earn2=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')->where('user_id',Auth::user()->id)->count();
        $en=$earn2/$earn3 * 100;
        }else{
            $en=0;
        }
        //dd($earn);
        $message=Contact::whereDay('created_at', date('d'))->take(10)->get();
        $today=Order::
        join('details','orders.id','=','details.order_id')
        ->whereDay('orders.created_at', date('d'))->take(5)->get();
         
         $chart=DB::select(DB::raw("select count(*) as total_product, product from details group by product"));
         
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="['".$char->product."',     ".$char->total_product."],";
            }
            $arr['chartdata']=rtrim($chartdata,",");
          
          $product =Stock2::where('stock','<',10)->get();
       
       $items = array();
    foreach($product as $pro) {
        $items[] = $pro;
       //dd($items);
     
    $details = [
            'greeting' => 'data',
            'body' => 'product data',
            'alert' => 'Product Stock is Too low!',
        ];
      Notification::send($items,new ProductStock($details));

     
      }
     
    $date=Carbon::now();
    return view('vendor.vendorcount',$arr,compact('comp','com','order','or','sale','sl','earn','en','message','today','date'));
    }

    function count2()
    {
        $user=User::whereMonth('created_at', date('m'))->count();
        if($user)
        {
        $per=User::count();
        $pr=$user/$per * 100;
        }else{
            $pr=0;
        }

        $vendor=Vendor::whereMonth('created_at', date('m'))->count();
        if($vendor)
        {
        $per=Vendor::count();
        $pr2=$vendor/$per * 100;
        }else{
            $pr2=0;
        }
        
        $msg=Contact::whereDay('created_at', date('d'))->count();
         if($msg)
        {
        $ms=User::count();
        $msg2=$msg/$ms * 100;
        }else{
            $msg2=0;
        }

        $message=Contact::whereDay('created_at', date('d'))->take(10)->get();
      

    return view('Dashboard.dashboard',compact('user','vendor','message','pr','pr2','msg','msg2'));
    }
    
}
