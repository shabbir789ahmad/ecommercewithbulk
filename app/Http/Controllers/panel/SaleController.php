<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Models\Sale;
use App\Http\Traits\ImageTrait;
use App\classes\NewSale;
use Auth;
class SaleController extends Controller
{

    use ImageTrait;

    function index()
    {    
        $sale=new NewSale;
        $sales=$sale->get($vendor_id='',Auth::id());

        return view('Dashboard.sale.index',compact('sales'));
    }


    function create()
    {
        
        return view('Dashboard.sale.create');
    }

    function store(SaleRequest $request)
    {
        $dtas=[
          
          'sale_status'=>1,
          'admin_id'=>Auth::id(),
        ];

       $data=array_merge($request->validated(),$dtas);
        
        if($request->hasfile('image'))
        {
            $data=array_merge($data,['sale_image'=>$this->image()]);
        }
     
        return \App\Helpers\Form::createEloquent(new Sale,$data);
    }



    function edit(Sale $sale)
    {
        
        return view('Dashboard.sale.edit',compact('sale'));
    }


    function update(SaleRequest $request,$id)
    {  
         $datas=[
          
          'sale_status'=>1,
          'admin_id'=>Auth::id(),
        ];

        $data=array_merge($request->validated(),$datas);
        if($request->hasfile('image'))
        {
            $data=array_merge($data,['sale_image'=>$this->image()]);
        }

        
        return \App\Helpers\Form::updateEloquent(new Sale,$id,$data);
    }

    function destroy($id)
    {
        
      return \App\Helpers\Form::deleteEloquent(new Sale,$id,);
    }


    function Status(Request $request)
    {
      $status=Sale::where('id',$id)
        ->update([

         'sell_status'=>$request->sell_status,
       ]);
    }

}
