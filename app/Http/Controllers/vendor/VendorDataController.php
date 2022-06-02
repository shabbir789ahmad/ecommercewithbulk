<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;


use Carbon\Carbon;
use Auth,DB,DateTime;
use App\classes\OrderClass;
class VendorDataController extends Controller
{

    function count(Request $req,OrderClass $orders)
    {    
       
        
        $query=Product::Vendor();

        $product=$query->count();
        $product_by_month=$query->whereMonth('created_at', date('m'))->count();
     
      if($product==0)
      {
        $product=1;
      }
     $product_by_month= $product_by_month/$product * 100;
   
     $order=OrderDetail::Vendor()->count();
      $order_by_month=OrderDetail::Vendor()->whereMonth('created_at', date('m'))->count();
     
      if($order==0)
      {
        $order=1;
      }
     $order_by_month= $order_by_month/$order * 100;
       
      $orders=$orders->orders($user_id='',Auth::id());

       
            
         $chart=DB::select(DB::raw("select sum(sub_total) as sub_total, product_id from order_details group by product_id"));
      
          $chartdata="";
          foreach($chart as $char){
            $chartdata.="".$char->sub_total.",";
            }
            $arr['chartdata']=rtrim($chartdata,",");
        

        $chart2=DB::select(DB::raw("select count(*) as total_product, product_name from order_details group by product_name"));
         
          $chartdata2="";
          $chartdata3=[];
          foreach($chart2 as $char){
            $chartdata2.="[".$char->total_product."],";
            $chartdata3[]=$char->product_name;
            }
            $arr2['chartdata2']=rtrim($chartdata2,",");
            $arr3['chartdata3']=$chartdata3;
       
      $sales=$this->monthalySale();

      $saleData="";
              foreach($sales as $sale)
              {
                $saleData.="[".$sale->sub_total."], '". date('F', mktime(0, 0, 0, $sale->month, 10))."',";
               }
          
         $arr4['saleData']=rtrim($saleData,",");
    // dd($arr4);
    return view('vendor.dashboard',$arr,compact('product','product_by_month','order','order_by_month','orders','sales'))->with($arr2)->with($arr3)->with($arr4);
    }



    function monthalySale()
    {
       return OrderDetail::select(
    
               DB::raw('month(created_at) as month'),
               DB::raw('sum(sub_total) as sub_total'),
              )
              ->groupBy('month')
              ->get();

              
    }

   
}



