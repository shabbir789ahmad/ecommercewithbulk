<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Image;
use App\Models\Stock2;
use App\Models\Sell;
use App\Models\Sale;
use App\Models\VendorSale;
use App\Models\Banner;
use App\Http\Traits\StoreTrait;
use App\Http\Traits\ProductTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    use StoreTrait;
    use ProductTrait;

    
    function showStore($id)
    {
       
      $products=$this->storeProduct2($id);
      $sale=$this->sale();
      $banner=$this->banner();
      $date=$this->carbon();
      $vendorsale=$this->vendorSale();
      //dd($products);
      return view('store',compact('products','sale','date','banner','vendorsale'));
     }

    function getStore(Request $req)
    {
        $id=Auth::user()->id;
      $products=$this->storeProduct($id);
      $sale=$this->sale();
      $sale2=$this->sale2();
      $banner=$this->banner();
      $date=$this->carbon();
      $vendorsale=$this->vendorSale();
      $vendorsale2=$this->vendorSale2();
      //dd($products);
      return view('vendor.sale_product',compact('products','sale','date','banner','sale2','vendorsale','vendorsale2'));
       

    }

     function upoloadBanner(Request $req)
     {
      $req->validate([
        'banner'=>'required',
        'heading1'=>'required',
        'heading2'=>'required',

      ]);
      $store=New Banner;
      if($req->hasfile('banner'))
      {
         $file=$req->file('banner');
         $ext=$file->getClientOriginalExtension();
         $filename=time().rand(1,1000).'.'.$ext;
         $file->move('uploads/img/' ,$filename);
         $store->banner=$filename;
      }
      $store->heading1=$req->heading1;
      $store->heading2=$req->heading2;
          //dd($store);
      $store->save();

      return redirect()->back()->with('success','Store Banner Uploaded');
     }
     function getbanner()
     {
      $banner=Banner::all();
      return view('vendor.get_banner',compact('banner'));
     }
     function deletebanner($id)
     {
      $banner=Banner::findorfail($id);
     $banner->delete();
     return redirect()->back()->with('success','banner Deleted');
     }

     function updatebanner(Request $req)
     {
      $banner=Banner::findorfail($req->id);

      if($req->hasfile('banner'))
      {
         $file=$req->file('banner');
         $ext=$file->getClientOriginalExtension();
         $filename=time().rand(1,1000).'.'.$ext;
         $file->move('uploads/img/' ,$filename);
         $banner->banner=$filename;
      }
      $banner->heading1=$req->heading1;
      $banner->heading2=$req->heading2;

      //dd($banner);
      $banner->save();
      
      return redirect()->back()->with('success','Store Banner Updated');
     }

     function onSale(Request $req)
     {
          $sale=new Sale;
          $sale->sell_id=$req->sell_id;
          $sale->sale_id=$req->sale_id;
          $sale->new_price=$req->new_price;
          $sale->discounts=$req->discounts;
          $sale->on_sale='1';
          $sale->save();
          return redirect()->back()->with('success','your product is on sale');
        
    }
    function vendorOnSale(Request $req)
     {
          $sale=new VendorSale;
          $sale->vendor_sell_id=$req->vendor_sell_id;
          $sale->vendor_sale_id=$req->vendor_sale_id;
          $sale->vendor_new_price=$req->vendor_new_price;
          $sale->vendor_discount=$req->vendor_discount;
          $sale->vendor_on_sale='1';
          $sale->save();
          return redirect()->back()->with('success','your product is on sale');
        
    }
     function outSale($id,Request $req)
    {
      $sale=Sale::where('sale_id',$id)->delete();
      $req->session()->flash('success','your product is Out Sale');
     return redirect()->back();
    }
     function vendorOutSale($id,Request $req)
    {
      $sale=VendorSale::where('vendor_sale_id',$id)->delete();
      $req->session()->flash('success','your product is Out Sale');
     return redirect()->back();
    }
}
