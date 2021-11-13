<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use Exception;
use Carbon\Carbon;
use App\Http\Traits\ImageTrait;
class SellController extends Controller
{
   use ImageTrait;
    function Sell(Request $req)
    {
         $req->validate([
            'sell_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'required',
         ]);
         $image=$this->getimage();
        $sell=Sell::create([
         'sell_name' =>$req->sell_name,
         'start_time' =>$req->start_time,
         'end_time' =>$req->end_time,
         'sell_status' =>'1',
         'image' =>$image,
        ]);
        return redirect()->back()->with('success','Sale Added');
    }

    function showSale(Request $req)
    {
          $today=Carbon::now();         
          $schedule="";
        if($req->get('sale_sche') !== Null)
        {
           $schedule=$req->get('sale_sche');
         }
        $query=Sell::latest();

           if($schedule=='online')
           {
           $query=$query->whereBetween('end_time',['start_time','end_time']);
           }
           if($schedule=='finished')
           {
            
            $query=$query->where('end_time','>', $today);
           }
           if($schedule=='shedule')
           {
            
            $query=$query->where('start_time','>', $today);
           }
          $query=$query->paginate(10);
          $sale=$query;
        return view('Dashboard.show_sale',compact('sale'));
    }
    function deleteSale($id)
   {
    $sale=Sell::findorfail($id);
       $sale->delete();
    return redirect()->back()->with('success','Sale Deleted');
   }
   function updateSale(Request $req)
   {
    $sale=Sell::findorfail($req->id);
     $sale->sell_name=$req->sell_name;
     $sale->start_time=$req->start_time;
     $sale->end_time=$req->end_time;
     $sale->save();
     return back()->with('success','Sale Updated');
   }
   function saleStatus(Request $req)
   {
    $status=Sell::findorfail($req->id);
    $status->sell_status=$req->sell_status;
    $status->save();

   }
   function searchSale(Request $req)
   {

     try
      {
         $search=$req->search;
         $sale=Sell::where('sell_name','LIKE',"%{$search}%")->paginate();
         
      }
      catch (ModelNotFoundException $exception) 
      {
        return back()->withError($exception->getMessage())->withInput();
     }
     return view('Dashboard.search_sale',compact('sale'));
    
   }

}
