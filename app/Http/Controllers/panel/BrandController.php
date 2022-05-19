<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    function index()
    {
       $brands=Brand::all();
       return view('Dashboard.brand.index',compact('brands'));
    }


    function create()
    {
  
       return view('Dashboard.brand.create');
    }

    function store(Request $request)
    {
        $request->validate([
         'brand'=>'required',
         
        ]);

        $data=[
           
            'bname'=>$request->brand,
        ];

         return \App\Helpers\Form::createEloquent(new Brand, $data);
        
    }

    function  edit($id)
    {
       $brand=Brand::findorfail($id);
       return view('Dashboard.brand.edit',compact('brand'));
    }


    
    function update(Request $request,$id)
    {
        $request->validate([
         'brand'=>'required',
         
        ]);

        $data=[
           
            'bname'=>$request->brand,
        ];

         return \App\Helpers\Form::updateEloquent(new Brand,$id, $data);
        
    }

     function destroy($id)
    {   
    
      return \App\Helpers\Form::deleteEloquent(new Brand,$id);
   }
}
