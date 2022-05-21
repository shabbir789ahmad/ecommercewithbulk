<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminSale;
use App\Http\Traits\ImageTrait;
use App\classes\NewSale;
class SaleController extends Controller
{

    use ImageTrait;

    function index()
    {    
        $sale=new NewSale;
        $sales=$sale->get();

        return view('Dashboard.sale.index',compact('sales'));
    }


    function create()
    {
        
        return view('Dashboard.sale.create');
    }

    function store(Request $request)
    {
        $request->validate([
         
           'sell_name'=>'required',
           'start_time'=>'required',
           'end_time'=>'required',
           'image'=>'',
          ]);

        $data=[
          
          'sell_name'=>$request->sell_name,
          'start_time'=>$request->start_time,
          'end_time'=>$request->end_time,
          'sell_status'=>1,
          'sale_image'=>$this->image(),
        ];
      
        return \App\Helpers\Form::createEloquent(new AdminSale,$data);
    }



    function edit(AdminSale $sale)
    {
        
        return view('Dashboard.sale.edit',compact('sale'));
    }


    function update(Request $request,$id)
    {
        $request->validate([
         
           'sell_name'=>'required',
           'start_time'=>'required',
           'end_time'=>'required',
           'sell_status'=>'',
           'image'=>'',

        ]);
        

        $data=[
          
          'sell_name'=>$request->sell_name,
          'start_time'=>$request->start_time,
          'end_time'=>$request->end_time,
          'sell_status'=>$request->sell_status,
          
        ];
        if($request->hasfile('image'))
        {
           $data= array_merge($data,$this->image());
        }
        return \App\Helpers\Form::updateEloquent(new AdminSale,$id,$data);
    }

    function destroy($id)
    {
        
      return \App\Helpers\Form::deleteEloquent(new AdminSale,$id,);
    }


    function Status(Request $request)
    {
      $status=AdminSale::where('id',$id)
        ->update([

         'sell_status'=$request->sell_status,
       ]);
    }

}
