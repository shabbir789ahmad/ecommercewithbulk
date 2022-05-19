<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    function adminLogin(Request $req)
    {
     
     $req->validate([
          'email' => 'required|email',
         'password' => 'required|string',
       ]);

        $data=$req->only('email','password');
      
       if( Auth::guard('admin')->attempt($data,  $req->remember))
       {
        
        return redirect(route('admin.dashboard'));
       }else
       {
              return redirect(route('admin.login'))->with('message','These Data does not Match Our Record');
       }
    }



    public function logout()
    {
    if(Auth::guard('admin')->logout())
    {
        return redirect(route('admin.login'));
    }
}
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }
     protected function guard()
    {
        return Auth::guard('admin');
    }
}
