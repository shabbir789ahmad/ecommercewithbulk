<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
class ProfileController extends Controller
{
    function index()
    {
        return view('vendor.profile.index');
    }

    function update(Request $request,$id)
    {
        Vendor::where('id',$id)->update([
           
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,

        ]);

        return redirect()->back()->with('success','Profile Updated');
    }
}
