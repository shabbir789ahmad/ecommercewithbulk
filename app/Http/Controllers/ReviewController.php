<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
class ReviewController extends Controller
{
    function review(Request $req)
    {
        $req->validate([
          'uname'=> 'required',
          'rating' => 'required',
          'message' => 'required',
        ]);
        
        if(Auth::user())
        {
        $review=New Review;
        $review->uname=$req->uname;
        $review->rating=$req->rating;
        $review->message=$req->message;
        $review->review_id=$req->review_id;
        $review->user_id=Auth::user()->id;
        $review->image=Auth::user()->image;
        $review->save();
        return redirect()->back()->with('success','Thank you for Reviews');
        }else{
            return redirect()->route('login')->with('message','Please Login First');
        }
    }
}
