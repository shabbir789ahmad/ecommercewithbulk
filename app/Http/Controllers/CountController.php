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
use Illuminate\Support\Facades\DB;
class CountController extends Controller
{
    use StoreTrait;
    function count(Request $req)
    {    
        $now=Carbon::now();
        $counter='';
        if($req->get('counter') !== Null)
        { 
            $counter=$req->get('counter');
        }
        //echo $counter;
        $query=Order::join('details','orders.id','=','details.order_id')->whereMonth('orders.created_at',date('m'))->where('details.order_status','delivered');
        
        if($counter=='this')
        {
          $start = $now->startOfWeek()->format('Y-m-d H:i');
          $end = $now->endOfWeek()->format('Y-m-d H:i');
          $query=$query->whereBetween('orders.created_at',[$start,$end]);
        }
        if($counter=='mid')
        {   
            $query=$query->where('orders.created_at','>=',$now->subdays(15));
        }
        if($counter=='month')
        {
            $query=$query->whereMonth('orders.created_at', date('m'));
        }

        $comp=$query->count();
        //dd($comp);
        if($comp)
        {
        $comp2=Order::count();
        $com=$comp/$comp2 * 100;
        }else{
            $com=0;
        }
        
        
      $query=Order::whereMonth('created_at', date('m'));
       
        if($counter=='this')
        {
          $start = $now->startOfWeek()->format('Y-m-d H:i');
          $end = $now->endOfWeek()->format('Y-m-d H:i');
          $query=$query->whereBetween('created_at',[$start,$end]);
        }
        if($counter=='mid')
        {
          $query=$query->where('created_at','>=',$now->subdays(15));
        }
        if($counter=='month')
        {
            $query=$query->whereMonth('created_at', date('m'));
        }
      $order=$query->count();
      
        if($order)
        {
        $order2=Order::count();
        $or=$order/$order2 * 100;
        }else{
            $or=0;
        }

        $query=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','pending')
        ->whereMonth('orders.created_at', date('m'));
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
        $sale=$query->count();
        // dd($sale);
        if($sale)
        {
        $sale2=Order::
        join('details','orders.id','=','details.order_id')
        ->count();
        $sl=$sale/$sale2 * 100;
        }else{
            $sl=0;
        }
        
        $query=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')
        ->whereMonth('details.created_at', date('m'));
         
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

        $earn=$query->sum('price');


      $earn3= Order::
        join('details','orders.id','=','details.order_id')
        ->whereMonth('details.created_at', date('m'))->count();
         
         if($earn)
        {
        $earn2=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')->count();
        $en=$earn2/$earn3 * 100;
        }else{
            $en=0;
        }
        //dd($earn3);
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
    return view('vendor.vendorcount',$arr,compact('comp','com','order','or','sale','sl','earn','en','message','today','order2','date'));
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
