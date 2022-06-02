<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Vendor;
use Auth;
class FollowerController extends Controller
{
    function follow(Request $request)
    {
      Follower::create([
        'user_id'=>Auth::id(),
        'vendor_id'=>$request->vendor_id,
      ]);
      return response()->json('Thanks For Following Us');
    }

    function unFollow(Request $request)
    {
      Follower::where('user_id',Auth::id())->where('vendor_id',$request->vendor_id)->delete();
      return response()->json('Thanks');
    }

    function followers(Request $request)
    {
        $vendor=Vendor::withcount('followers')->findorfail($request->vendor_id);
        return response()->json($vendor);
    }
}
