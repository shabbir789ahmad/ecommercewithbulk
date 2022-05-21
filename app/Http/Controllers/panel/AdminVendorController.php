<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
class AdminVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendor()
    {
        $vendors=Vendor::all();
        return view('Dashboard.user.all_vendor',compact('vendors'));
    }

    function blockvendor()
    {
        $vendors=Vendor::onlyTrashed()->get();
        return view('Dashboard.user.all_bock_vendor',compact('vendors'));
    }

   
    
    function restorevendor($id)
    {
        $vendor=Vendor::withTrashed()->findorfail($id);
        $vendor->restore();
        return redirect()->back()->with('success','This vendor is Restored');
    }

    function vendorStatus(Request $req)
    {
         $status=Vendor::findorfail($req->id);
         $status->vendor_status=$req->vendor_status;
         $status->save();

    }

     function destroy($id)
    {
     
     return App\Helpers\Form::deleteEloquent(new Vendor,$id);
    }
   
}
