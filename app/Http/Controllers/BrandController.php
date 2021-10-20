<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    function uploadBrand(Request $req)
    {
        $req->validate([
          'bname'=>'required',
        ]);

        $brand=new Brand;
        $brand->bname=$req->bname;
        $brand->save();

        return redirect()->back()->with('success','New Brand Uploaded');
    }

    function getBrand()
    {
       $brand=Brand::all();
       return view('vendor.brand_show',compact('brand'));
    }

    public function deleteBrand($id)
    {
        $brand=Brand::findorfail($id);
        $brand->delete();
        return redirect()->back()->with('success','Brand Has Been Deleted');
    }
     function updateBrand($id)
    {
       $brand=Brand::findorfail($id);
       return view('vendor.brand_update',compact('brand'));
    }
     function updateBrand2(Request $req)
    {
       $brand=Brand::findorfail($req->id);
        $brand->bname=$req->bname;
        $brand->save();

    return redirect()->route('vendor.get-brand')->with('success','Brand  Updated');
    }
}
