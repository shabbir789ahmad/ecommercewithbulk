<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Contact;
use App\Models\Stock;
use App\Models\Stock2;
use App\Notifications\ProductStock;
use Notification;
use Illuminate\Support\Facades\DB;
class CountController extends Controller
{
    function count()
    {
        $user=User::whereMonth('created_at', date('m'))->count();
        if($user)
        {
        $per=User::count();
        $pr=$user/$per * 100;
        }else{
            $pr=0;
        }
        
        
      $order=Order::whereMonth('created_at', date('m'))->count();
      $order2=Order::
      join('details','orders.id','=','details.order_id')->
      whereDay('orders.created_at', date('m'))->take('3')->get();
        if($order)
        {
        $order2=Order::count();
        $or=$order/$order2 * 100;
        }else{
            $or=0;
        }

        $sale=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')
        ->whereMonth('orders.created_at', date('m'))->count();
        if($sale)
        {
        $sale2=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')->count();
        $sl=$sale/$sale2 * 100;
        }else{
            $sl=0;
        }
        
        $earn=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')
        ->whereMonth('orders.created_at', date('m'))->count('price');
         
         if($earn)
        {
        $earn2=Order::
        join('details','orders.id','=','details.order_id')
        ->where('order_status','delivered')->count('price');
        $en=$earn/$earn2 * 100;
        }else{
            $en=0;
        }
        
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
     
   
  
    return view('Dashboard.dashboard',$arr,compact('user','pr','order','or','sale','sl','earn','en','message','today','order2'));
    }
    
}
