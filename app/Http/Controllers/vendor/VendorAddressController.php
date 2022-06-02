<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorAddress;
use App\Models\State;
use Auth;
class VendorAddressController extends Controller
{
    function index()
    {
        $address=VendorAddress::where('vendor_id',Auth::id())->first();
        $states=State::states();
        return view('vendor.profile.edit',compact('address','states'));
    }


    function store(Request $request)
    {

        VendorAddress::create([
          
           'address'=>$request->address,
           'city'=>$request->city,
           'state'=>$request->state,
           'location'=>$request->location,
           'vendor_id'=>Auth::id(),

        ]);
    }
}
