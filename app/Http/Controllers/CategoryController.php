<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dropdown;
use App\Models\Submenue;
class CategoryController extends Controller
{
    
    function getSlider()
    {
        $getcategory =Category::all();
    return view('Dashboard.upload_slider',compact('getcategory'));
    }

      function getCat()
    {   
    
     $maincat=Category::all();
        
    return view('Dashboard.category_uploads',compact('maincat'));
    }


     function showCat()
    {   
    
     $showcat=Category::
          join('submenues','categories.id','=','submenues.menue_id')
          ->leftjoin('dropdowns','submenues.id','=','dropdowns.dropdown_id')
            ->select('submenues.id','categories.category','submenues.menue_id','submenues.smenue','dropdowns.name')
          ->get();
          $cat=Category::all();
        //dd($showcat);
    return view('Dashboard.category_show',compact('showcat','cat'));
   
    }

    function deleteCat($id)
    {   
    
     $showcat=Submenue::findorfail($id);
    
    if($showcat->delete())
    {
        return redirect()->back()->with('success','Category Has Been Deleted');
    }else
    {
        return redirect()->back()->with('error','Cannot Delete Category');
    }
    
   
    }

    //upload category
    function uploadCat(Request $req)
    {
        $req->validate([
         'menue_id'=>'required',
         'smenue'=>'required|alpha'
        ]);

        $smenue=new Submenue;
        $smenue->menue_id=$req->menue_id;
        $smenue->smenue=$req->smenue;

        if($smenue->save())
       {
        return redirect()->back()->with('success','Category Has Been Created');
      }else{
        return redirect()->back()->with('success','Category Creation Failed ');
      }
    }
    
       function getCategory2($id)
    {   
    
     $showcat=Submenue::findorfail($id);
    return view('Dashboard.category_update',compact('showcat'));
   
    }
     function updateCat(Request $req)
    {
      

        $smenue=Submenue::findorfail($req->id);
        $smenue->menue_id=$req->menue_id;
        $smenue->smenue=$req->smenue;

        if($smenue->save())
       {
        return redirect()->route('admin.show-category')->with('success','Category Has Been Update');
      }else{
        return redirect()->back()->with('success','Category Updation Failed ');
      }
    }
  
}
