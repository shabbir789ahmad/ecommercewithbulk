<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\User;
use App\Models\State;
use App\Models\CoverPhoto;
use App\Models\UserAddress;
use App\Models\About;
use App\Http\Traits\UserTrait;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Str;
class UserController extends Controller
{
    use UserTrait;
    use ImageTrait;
    
    function index()
    {
        return view('User.account');
    }

    function create()
    {

        $user=$this->user(Auth::id());
        $cover=CoverPhoto::where('user_id',Auth::id())->first();
        
        return view('User.user_profile',compact('user','cover'));
    }

    function edit($id)
    {

        $user=$this->user($id);
          // $slug = Str::slug($user->name, '-');
       
        return view('User.login_and_securty',compact('user'));
    }

   function update(Request $req,$id)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
         ]);
        
        $user=$this->user($id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->image=$this->getimage();
        $user->password=Hash::make($req->password);
      
        $user->save();
        return back()->with('success','Your Account updated');
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

     

    

   

    

    //update user phone number
    function phoneUpdate(Request $request)
    {
        User::where('id',$request->id)->update(['phone'=>$request->phone]);
        return response()->json($request->phone);
    }

    function emailUpdate(Request $request)
    {
        User::where('id',$request->id)->update(['email'=>$request->email]);
        return response()->json($request->email);
    }

    function addressUpdate(Request $request)
    {
        $state=State::findorfail($request->state);
       $address= UserAddress::updateOrCreate(
            [
              'user_id'=>$request->id,
            ],
            [
            'state'=>$state->state,
            'city'=>$request->city,
            'address'=>$request->address,
            'user_id'=>$request->id,
        ]);
        return response()->json($address);
    }
}
