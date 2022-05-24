<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCost;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

         $shippings=ShippingCost::shippings();
        return view('Dashboard.shipping.index',compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           
            'city'=>'required',
            'shipping_cost'=>'required',
        ]);
        $data=[
          
          'city'=>$request->city,
          'shipping_costs'=>$request->shipping_cost,
        ];
       
        return \App\Helpers\Form::createEloquent(new ShippingCost,$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingCost $shipping)
    {
        return view('Dashboard.shipping.edit',compact('shipping'));
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
        $request->validate([
           
            'city'=>'required',
            'shipping_costs'=>'required',
        ]);
        $data=[
          
          'city'=>$request->city,
          'shipping_costs'=>$request->shipping_costs,
        ];
        return \App\Helpers\Form::updateEloquent(new ShippingCost,$id,$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new ShippingCost,$id);
    }

    public function cities(Request $request)
    {  

         $shippings=ShippingCost::where('state_id',$request->id)->get();
         return response()->json($shippings);
    }
}
