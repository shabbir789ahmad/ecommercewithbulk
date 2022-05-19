<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
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



     function vendorSign(Request $req)
     {
        $req->validate([
         
          'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
         'image' => '',
         'store_name' => 'required',
        ]);


        $request = app('request');
      if($request->hasfile('image'))

          {
             $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $name= time(). '.' . $ext;
            $file->move('uploads/img/',$name);
          
          }
       Vendor::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'store_name' => $req->store_name,
            'image' => $name,
            'password' => Hash::make($req->password),

        ]);
       return redirect('vendor/dashboard');
     }
    
       public function logout()
    {
    if(Auth::guard('vendor')->logout())
    {
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
