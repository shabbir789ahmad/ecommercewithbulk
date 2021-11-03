<?php
namespace App\Http\Traits;
use App\Models\Order;
use App\Models\Detail;
use Carbon\Carbon;
use Auth;
trait OrderTrait{

	//function for order
     function orders()
     {
        $req=app('request');
        $now=Carbon::now();
        $stat="";
      
      if($req->get('status')!== null)
       {
        $stat=$req->get('status');
       }
      
    // echo $counter;
     
      $query=Order::join('details','orders.id','=','details.order_id')
      ->select('orders.id','details.product','details.image','details.price','details.quentity','details.order_status','orders.payment','details.total')->where('user_id',Auth::user()->id);

     
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
       
       $query=$query->withoutTrashed();
      $order=$query->paginate(10);

     return $order;
     }

    

  }
?>