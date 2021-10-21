<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenue;
use App\Models\Category;
use App\Models\Dropdown;
use Illuminate\Support\Facades\DB;
class SubCategoryController extends Controller
{
    function subCategory()
    {
        
        
   $cat = DB::table("categories")->pluck("category","id");
   //dd($cat);
      return view('Dashboard.subcategory_uploads',compact('cat'));
    }


public function subCategory2($id) 
{        
       $sunmenue = DB::table("submenues")->where('menue_id',$id)->
       pluck("smenue","id");

      return response()->json($sunmenue);
}

 



  public function catOrder($id) 
   {        
     $sub = DB::table("dropdowns")->where('category_id',$id)->pluck("name","id");

      return response()->json($sub);
   }
    public function stockDrop($id) 
   {        
     $sub = DB::table("dropdowns")->where('dropdown_id',$id)->pluck("name","id");

      return response()->json($sub);
   }

   function uploadSubCategory(Request $req)
   {
    $req->validate([
       'category_id'=>'required',
       'dropdown_id'=>'required',
       'name'=>'required',
       'image_size'=>'required|numeric',
    ]);

    $drop=new Dropdown();
    $drop->category_id=$req->category_id;
    $drop->dropdown_id=$req->dropdown_id;
    $drop->name=$req->name;
    $drop->image_size=$req->image_size;

    $drop->save();
    return redirect()->back()->with('success','Sub Category Uploaded');
   }
  
   function showSubCategory()
   {
    $data=Category::
    join('submenues','categories.id','=','submenues.menue_id')
    ->join('dropdowns','submenues.id','=','dropdowns.dropdown_id')
    ->get();
    // dd($data);
    return view('Dashboard.subcategory_show',compact('data'));
   }


   function deleteSubCategory($id)
   {
    $data=Dropdown::findorfail($id);
    $data->delete();


    return redirect()->back()->with('success','Sub Category Deleted');
   }

  
   function updateSubCategory($id)
   {
    $data=Dropdown::findorfail($id);
    
     //dd($data);
    return view('Dashboard.subcategory_update',compact('data'));
   }

     function updateSubCategory2(Request $req)
   {
   

    $drop=Dropdown::findorfail($req->id);
   
    $drop->category_id=$req->category_id;
    $drop->dropdown_id=$req->dropdown_id;
    $drop->name=$req->name;
    $drop->save();
    return redirect()->route('admin.show-sub-category')->with('success','Sub Category Updated');
   }

}
