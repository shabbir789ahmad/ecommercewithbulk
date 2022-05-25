<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCost;
use App\Models\State;
use App\Http\Requests\CityRequest;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

         $shippings=State::with('cities')->get();
        return view('Dashboard.shipping.index',compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::states();
        return view('Dashboard.shipping.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
       
        
       
        return \App\Helpers\Form::createEloquent(new ShippingCost,$request->validated());
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
        $states=State::states();
        return view('Dashboard.shipping.edit',compact('shipping','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {

        return \App\Helpers\Form::updateEloquent(new ShippingCost,$id,$request->validated());
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
