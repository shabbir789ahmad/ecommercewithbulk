<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Models\Stock;
use App\Models\Deal;
use App\Models\Discount;

use Illuminate\Support\Facades\DB;
use Auth;
class DealController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Stock::where('vendor_id',Auth::id())->get();
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
          'deal_price'=> 'required',
          'deal_end_date'=> 'required',
          'deal_image'=> 'required',
          'product_id'=> 'required',
        ]);

          DB::transaction(function() use($req){
           
           $deal=Deal::create([
 
         'deal_name' => $req->deal_name,
         'deal_detail' => $req->deal_detail,
         'deal_price' => $req->deal_price,
         'deal_start_date' => $req->deal_start_date,
         'deal_end_date' => $req->deal_end_date,
         'deal_vendor_id' => Auth::id(),
         'deal_image' => $this->getimage(),

        ]);

           $n = sizeof($req->product_id);
         for($i = 0; $i < $n; $i++) 
         {
            $color= Discount::create([
            'product_id' => $req->product_id[$i],
            'deal_id' =>$deal->id,
             ]);
           }

          });
          return back()->with('success','Deal Created Successfully');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function get($id)
    {
        $deal=Stock::
         join('stock2s','stocks.id','=','stock2s.stock_id')
        ->where('stocks.id',$id)->get();
        
        return response()->json($deal);
    }
*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $deal=Stock::
              join('stock2s','stocks.id','=','stock2s.stock_id')
            ->join('deals','stocks.id','=','deals.deal_id')
            ->where('stocks.vendor_id',Auth::id())->get();
            return view('vendor.deal_show',compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
