<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Models\Stock;
use App\Models\Deal;
use App\Models\Discount;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=$this->category();
        return view('vendor.deal_create',compact('product'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $req->validate([
          'deal_name'=> 'required',
          'deal_detail'=> 'required',
          'deal_end_date'=> 'required',
          'image'=> 'required',
          'product_id'=> 'required',
          'product_discount'=> 'required',
        ]);

          DB::transaction(function() use($req){
           
           $deal=Deal::create([
 
         'deal_name' => $req->deal_name,
         'deal_detail' => $req->deal_detail,
         'deal_end_date' => $req->deal_end_date,
         'deal_vendor_id' => Auth::id(),
         'deal_image' => $this->getimage(),

        ]);

        $n = sizeof($req->product_id);
         for($i = 0; $i < $n; $i++) 
         {
            $color= Discount::create([
            'product_discount' => $req->product_discount[$i],
            'product_id' => $req->product_id[$i],
            'deal_id' =>$deal->id,
             ]);
           }

          });
          return back()->with('success','Deal Created Successfully');
        
    }

   
    public function get($id)
    {
        $deal=Stock::
         join('stock2s','stocks.id','=','stock2s.stock_id')
        ->where('stocks.drop_id',$id)->get();
        
        return response()->json($deal);
    }

    
    public function show()
    {
        $now=$this->carbon();
        $deal=Deal::
            where('deal_vendor_id',Auth::id())->where('deal_end_date','>',$now)->get();
            foreach($deal as $d)
            {
             $d->product=Discount::where('deal_id',$d['id'])->get();
            }
            return view('vendor.deal_show',compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {   
        $drop_id='';
        $vid=Auth::id();
        $deal=Deal::
        join('discounts','deals.id','=','discounts.deal_id')
        ->where('deals.id',$id)->get();
        
        $product=$this->detail2($id,$drop_id,$vid);
        $cat=$this->category();
        return view('vendor.deal_detail',compact('deal','product','cat'));
    }

    public function updateDeal(Request $req)
    {
        $deal=Deal::findorfail($req->id);

        $deal->deal_name = $req->deal_name;
         $deal->deal_detail = $req->deal_detail;
         $deal->deal_end_date = $req->deal_end_date;
         $deal->deal_vendor_id = Auth::id();
         $deal->deal_image = $this->getimage(); 
        $deal->save();
        return back()->with('success','Deal Updates');
    }

    public function update(Request $req)
    {
         $n = sizeof($req->product_id);
         //dd($req->product_discount);
         for($i = 0; $i < $n; $i++) 
         {
             Discount::updateOrCreate([
            'product_id' => $req->product_id[$i],
            'deal_id' => $req->deal_id[$i],
            'product_discount' => $req->product_discount[$i],
             ]);
           }
           
        
        return back()->with('success','Product added To Deal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$deal_id)
    {
        $deal=Discount::
          where('discounts.product_id',$id)->where('discounts.deal_id',$deal_id)->first();
       $deal->delete();
       return back()->with('success','product Deleted from Deal');
    }
}
