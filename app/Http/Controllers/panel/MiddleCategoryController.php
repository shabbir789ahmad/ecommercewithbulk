<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MiddleCategory;
use App\Models\Category;
use App\Http\Traits\CategoryTrait;
class MiddleCategoryController extends Controller
{

    use CategoryTrait;
    function index()
    {   
       
       $middle_categories=Category::with('categories')->get();
         
       return view('Dashboard.middlecategory.index',compact('middle_categories'));
    }

    function create()
    {   
        $categories=$this->categories();
       return view('Dashboard.middlecategory.create',compact('categories'));
    }

    function store(Request $request)
    {
        $request->validate([
         'category_id'=>'required',
         'middlecategory_name'=>'required',
         
        ]);
 
        $data=[
           
            'category_id'=>$request->category_id,
            'middlecategory_name'=>$request->middlecategory_name,
        ];

         return \App\Helpers\Form::createEloquent(new MiddleCategory, $data);
        
    }

    function edit($id)
    {   
    
       $categories=$this->categories();
       $middle=MiddleCategory::findorfail($id);
       return view('Dashboard.middlecategory.edit',compact('categories','middle'));
    }

     function update(Request $request,$id)
    {
        $request->validate([
         'category_id'=>'required',
         'middlecategory_name'=>'required',
         
        ]);
 
        $data=[
           
            'category_id'=>$request->category_id,
            'middlecategory_name'=>$request->middlecategory_name,
        ];

         return \App\Helpers\Form::updateEloquent(new MiddleCategory,$id, $data);
        
    }

    function destroy($id)
    {   
    
      return \App\Helpers\Form::deleteEloquent(new MiddleCategory,$id);
   }


   function middleCategory(Request $request)
   {
     $middle=MiddleCategory::where('category_id',$request->id)->get();
     return response()->json($middle);
   }
}
