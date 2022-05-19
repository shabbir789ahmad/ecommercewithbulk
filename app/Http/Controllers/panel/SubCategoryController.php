<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\MiddleCategory;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ImageTrait;
class SubCategoryController extends Controller
{

    use CategoryTrait;
    use ImageTrait;
    function index()
    {
        $subcategories=SubCategory::all();
        return view('Dashboard.subcategory.index',compact('subcategories'));
    }

    function create()
    {
        $middlecategories=MiddleCategory::all();
        $categories=$this->categories();
        return view('Dashboard.subcategory.create',compact('categories','middlecategories'));
    }

    function store(Request $request)
    {

        $request->validate([
         'subcategory_name'=>'required',
         'image'=>'required',
         
        ]);

        $data=[
           
           'category_id'=>$request->category_id,
           'middle_category_id'=>$request->middlecategory_id,
           'subcategory_name'=>$request->subcategory_name,
            'subcategory_image'=>$this->image(),
        ];
 
         return \App\Helpers\Form::createEloquent(new SubCategory, $data);
    }

    function destroy($id)
    {
        return \App\Helpers\Form::deleteEloquent(new SubCategory,$id);
    }


    function subCategory(Request $request)
   {
     $middle=SubCategory::where('middle_category_id',$request->id)->get();
     return response()->json($middle);
   }
}
