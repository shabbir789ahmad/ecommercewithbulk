<?php
namespace App\Http\Traits;
use App\Models\Deal;
use App\Models\Stock;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
trait ImageTrait{

  function getimage()
  { 
     
  	 $req=app('request');
      
  	if($req->hasfile('image'))
    {
      $file=$req->file('image');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
       $file->move('uploads/img/', $filename);
       $image=$filename;
     
    }

    return $image;
  }


  function deal($id,$did)
  {
    $query=Stock::
    join('stock2s','stocks.id','=','stock2s.stock_id')
    ->join('deals','stocks.id','=','deals.deal_id');
     if($did)
     {
      $query=$query->select('deals.id','stock2s.stock_id','stock2s.sell_price','stock2s.discount','deals.deal_name','deals.deal_image','deals.deal_end_date','deals.deal_vendor_id','stocks.product','stock2s.stock','stock2s.sold_stock');
     }else{
      $query=$query->select('stocks.id','stock2s.sell_price','stock2s.discount','deals.deal_name','deals.deal_image','deals.deal_end_date','deals.deal_vendor_id','stocks.product','stock2s.stock','stock2s.sold_stock','stocks.drop_id');
     }
    
    
    if($id)
    {
      $query=$query->where('vendor_id',$id);
    }
    $deal=$query->wherenotNull('deal')->paginate(10);

    return  $deal;      
  }

 /*function deal2($id)
  {
    $now=Carbon::now();
    $query=Stock::
    join('stock2s','stocks.id','=','stock2s.stock_id')
    ->select(
         \DB::raw('SUM(sell_price) AS price'), 
         \DB::raw('SUM(discount) AS discount'),
      );

     if($id)
     {
      $query=$query->where('vendor_id',$id);
     }

    $deal2=$query->wherenotNull('deal_id')->get();

    return  $deal2;      
  }

 */
 
 }

?>