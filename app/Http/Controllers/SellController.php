<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
class SellController extends Controller
{
    function Sell(Request $req)
    {
         $req->validate([
            'sell_name' => 'required',
            'end_time' => 'required',
         ]);
        $sell=Sell::create([
         'sell_name' =>$req->sell_name,
         'end_time' =>$req->end_time,
        ]);
        return redirect()->back()->with('success','Sale Added');
    }

    function showSale()
    {
        $sale=Sell::latest()->paginate(10);
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

}
