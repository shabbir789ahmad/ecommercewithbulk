<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\AdminRequest;
class AdminController extends Controller
{
    function adminLogin(AdminRequest $request)
    {
     
      
       if( Auth::guard('admin')->attempt($request->validated(),$request->remember))
       {
        
        return redirect(route('admin.dashboard'));
       
       }else
       {
          return redirect()
               ->route('admin.login')
               ->with('message','These Data does not Match Our Record');
       }
    }



    public function logout()
    {
       if(Auth::guard('admin')->check())
       {
          Auth::guard('admin')->logout();
          return redirect()->route('admin.login');
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
