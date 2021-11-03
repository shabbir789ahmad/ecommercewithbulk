<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorSell;
class VendorSaleController extends Controller
{
    function vendorSale(Request $req)
    {
        $req->validate([
          'sale_name' =>'required',
          'sale_start' => 'required',
          'sale_end' =>'required'
        ]);
       
       $sale=new VendorSell;
        $sale->sale_name=$req->sale_name;
        $sale->sale_start=$req->sale_start;
        $sale->sale_end=$req->sale_end;
        $sale->sale_status='1';
        $sale->save();
        $req->session()->flash('success','New Sale Created');
        return redirect()->back();
    }
    function getSale()
    {
        $sale=VendorSell::latest()->paginate(10);
        //dd($sale);
        return view('vendor.vendor_all_sale',compact('sale'));
    }

    function deleteSale($id,Request $req)
    {
        $sale=VendorSell::findorfail($id);
        $sale->delete();
        $req->session()->flash('success','Sale Deleted Successfully');
        return redirect()->back();
    }

    function statusSale(Request $req)
    {
        $sale=VendorSell::findorfail($req->id);
        $sale->sale_status=$req->sale_status;
        $sale->save();
    }

    function updateSale(Request $req)
    {
        $sale=VendorSell::findorfail($req->id);
        $sale->sale_name=$req->sale_name;
        $sale->sale_start=$req->sale_start;
        $sale->sale_end=$req->sale_end;
        $sale->save();
        return redirect()->back()->with('success','sale Data Updated');
    }
}
