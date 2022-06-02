<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Hash;
use App\Models\Vendor;
use App\Http\Requests\VendorRequest;
class VendorController extends Controller
{
     function index()
    {
       return view('admin.vendor_login');
    }
    

    function logIn(Request $req)
     {

        $data=$req->only('email','password');
        if(Auth::guard('vendor')->attempt($data,$req->remember))
        {
            return redirect('vendor/dashboard');
        }else
        {
            return redirect()->back()->with('message','These data Do not match our record');
        }

     }



     function vendorSign(VendorRequest $request)
     {
      
    
      if($request->hasfile('image'))
       {
             $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $name= time(). '.' . $ext;
            $file->move('uploads/img/',$name);
          
        }
          $data=array_merge($request->validated(),['password' => Hash::make($request->password)]);
          $data=array_merge($data,['image' => $name]);
         
          Vendor::create($data);
          
       
          return redirect('vendor/dashboard');
     
    
     }
    
    public function logout()
    {
      if(Auth::guard('vendor')->check())
      {
         Auth::guard('vendor')->logout();
         return redirect(route('vendor.login'));
      }
    }


    public function __construct()
    {
        $this->middleware('vendor.guest')->except('logout');
    }


     protected function guard()
    {
        return Auth::guard('vendor');
    }

}
