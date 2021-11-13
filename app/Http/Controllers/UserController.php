<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Cover;
use App\Http\Traits\UserTrait;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
{
    use UserTrait;
    use ImageTrait;
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
        
        return view('Dashboard.all_user',compact('user'));
    }
     function blockuser()
    {
        $vendor=User::onlyTrashed()->get();
        return view('Dashboard.all_block_user',compact('vendor'));
    }
     function deleteuser($id)
    {
        $user=$this->user($id);
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

     function userDetail()
    {
        $user=$this->user(Auth::id());
         //dd($user);
        return view('User.login_and_securty',compact('user'));
    }
    function userprofile()
    {
        $user=$this->user(Auth::id());
        $cover=Cover::latest()->take(1)->get();
         //dd($user);
        return view('User.user_profile',compact('user','cover'));
    }

   function updateUser(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
         ]);
        
        $user=$this->user($req->id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->image=$this->getimage();
        $user->password=Hash::make($req->password);
      
        $user->save();
        return back()->with('success','Your Account updated');
    }

    function coverImage()
    {
        $cover=new Cover;
        $cover->image=$this->getimage();
        $cover->save();
        return back();
    }
}
