<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Models\Stock;
use App\Models\Deal;
use App\Models\Stock2;
use App\Models\Image;
use App\Models\Dropdown;
use App\Models\Category;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\StoreTrait;
use Illuminate\Support\Facades\DB;
use Auth;
class DealController extends Controller
{
    use ImageTrait;
    use ProductTrait;
    use StoreTrait;
    
    public function index()
    {
        $id=Auth::user()->id;
        $main = $this->category();
        $supply=$this->supply();
        $stock=$this->products($id);
        return view('vendor.deal_create',compact('stock','supply','main'));
    }
   
    public function create(Request $req)
    {
        
          DB::transaction(function() use($req){
           $deal=Stock2::where('stock_id',$req->id)->first();
           $deal->discount=$req->discount;
           $deal->sell_price=$req->sell_price;
           $deal->deal='1';
           $deal->save();
            
           Deal::updateOrCreate([
            'deal_id' => $req->id,
            'deal_name' => $req->deal_name,
             'deal_end_date' => $req->deal_end_date,
             
             'deal_vendor_id' => Auth::id(),
             'deal_image' => $this->getimage(),
            ]);

        });
          return back()->with('success','Deal Created Successfully');
        
    }

    function updateDeal(Request $req)
    {
        $deal=Deal::findorfail($req->id);
        $deal->deal_name=$req->deal_name;
        $deal->deal_end_date=$req->deal_end_date;
        $deal->deal_image=$this->getimage();
        $deal->deal_vendor_id=Auth::id();
        $deal->save();
        return back()->with('success','Deal Updated');
    }

    function show()
    {
        $deal=$this->deal(Auth::id(),$did='');
        return view('vendor.deal_show',compact('deal'));
    }

    function detail()
    {
        $deal=$this->deal(Auth::id(),$did=1);
        foreach($deal as $d)
        {
            $d->image=Image::where('image_id',$d['id'])->take('1')->get();
        }
        return view('vendor.deal_detail',compact('deal'));
    }

   function update(Request $req)
   {
    $deal=Stock2::where('stock_id',$req->id)->first();
    $deal->discount=$req->discount;
    $deal->sell_price=$req->sell_price;
    $deal->save();
    return back()->with('success','Deal Updated Successfully');
   }
 function destory($id,$stock_id)
   {
    $deal=Stock2::where('stock_id',$stock_id)->first();
    $deal2=Deal::where('id',$id)->first();
    //dd($deal);
    $deal->discount=null;
    $deal->deal=null;
    $deal->save();
    $deal2->delete();
    return route('vendor.all-deals')->with('success','Deal Updated Successfully');
   }

   function allDeal()
   {
    $deal=$this->deal($id='',$did='');
        foreach($deal as $d)
        {
            $d->image=Image::where('image_id',$d['id'])->take('1')->get();
        }
        //dd($deal);
        return view('all_deals',compact('deal'));
   }

}
