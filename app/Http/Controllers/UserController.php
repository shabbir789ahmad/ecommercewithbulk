<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    function order()
    {
        $order=Order::join('details','orders.id','=','details.order_id')
        ->select('orders.id','orders.name','orders.email','orders.payment','details.product','details.price','details.total','details.image','details.quentity')
        ->where('user_id',Auth::user()->id)
        ->get();
        //dd($order);
        return view('User.user_board',compact('order'));
    }
    function track($id)
    {
     $order=Order::join('details','orders.id','=','details.order_id')
        ->findorfail($id);
        //dd($order);
         return view('User.order_tracking',compact('order'));
    }

    function getvendor()
    {
        $vendor=Vendor::all();
        return view('Dashboard.all_vendor',compact('vendor'));
    }
    function blockvendor()
    {
        $vendor=Vendor::onlyTrashed()->get();
        return view('Dashboard.all_bock_vendor',compact('vendor'));
    }
      function deletevendor($id)
    {
        $vendor=Vendor::findorfail($id);
        $vendor->delete();
        return redirect()->back()->with('success','This vendor is Blocked');
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
     function getUser()
    {
        $user=User::all();
        return view('Dashboard.all_user',compact('user'));
    }
     function blockuser()
    {
        $vendor=User::onlyTrashed()->get();
        return view('Dashboard.all_block_user',compact('vendor'));
    }
     function deleteuser($id)
    {
        $user=User::findorfail($id);
        $user->delete();
        return redirect()->back()->with('success','This vendor is Blocked');
    }
     function restoreuser($id)
    {
        $vendor=User::withTrashed()->findorfail($id);
        $vendor->restore();
        return redirect()->back()->with('success','This User is Restored');
    }
    function userStatus(Request $req)
    {
         $status=User::findorfail($req->id);
         $status->user_status=$req->user_status;
         $status->save();

    }

   
}
