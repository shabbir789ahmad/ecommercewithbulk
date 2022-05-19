<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    function index()
    {
        $suppliers=Supplier::latest()->get();
         return view('vendor.supplier.index',compact('suppliers'));
    }


    function create()
    {
        
         return view('vendor.supplier.create');
    }

     function store(Request $req)
    {
        $req->validate([
          
          'supplier_name' => 'required',
          'address' => 'required',
          'phone' => 'required|numeric',
         
        ]);
      
        $data=[ 
           'supplier_name'=> $req->supplier_name,
           'address'=> $req->address,
           'phone'=> $req->phone,       
           
           ];
          return \App\Helpers\Form::createEloquent(new Supplier,$data);

    }

   function edit(Supplier $supplier)
    {
         return view('vendor.supplier.edit',compact('supplier'));
    }

     function update(Request $req,$id)
    {
        $req->validate([
          
          'supplier_name' => 'required',
          'address' => 'required',
          'phone' => 'required|numeric',
         
        ]);
      
        $data=[ 
           'supplier_name'=> $req->supplier_name,
           'address'=> $req->address,
           'phone'=> $req->phone,       
           
           ];
          return \App\Helpers\Form::updateEloquent(new Supplier,$id,$data);

    }

    function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new Supplier,$id);
    }
}
