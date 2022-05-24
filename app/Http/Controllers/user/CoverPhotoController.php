<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoverPhoto;
use App\Models\User;
use App\Http\Traits\ImageTrait;
use Auth;
class CoverPhotoController extends Controller
{

    use ImageTrait;
    function store()
    {

        $cover=new CoverPhoto;
        $cover->image=$this->image();
        $cover->user_id=Auth::id();
        $cover->save();
        return back()->with('cover','cover Photo Changed');
    }

    function update(Request $request, $id)
    {
        User::where('id',$id)->update(['about'=>$request->about]);
    }
}
