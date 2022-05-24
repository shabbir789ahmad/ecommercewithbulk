<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use Auth;
class OrderController extends Controller
{

  function index()
    {
      $address=UserAddress::where('user_id',Auth::id())->first();
      return view('checkout',compact('address'));
    }

    function Order(Request $request)
    {
    
      return redirect()->back();
    }
}
