<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Auth;
class FollowController extends Controller
{
    
    public function follow(Request $req)
    {
        $foll=Follow::where('id',$req->id)->where('user_id',$req->user_id)->where('follow_id',$req->follow_id)->first();
  
        if($foll==null )
        {
             Follow::create([
               'name' => Auth::user()->name,
               'user_id' =>  Auth::user()->id,
               'follow_id' => $req->follow_id,
               'follow' => '1',
            ]);
        }else
        {
            echo "cannot follow";
        }
        
    }

    
    public function unfollow(Request $req)
    {
        $follow=Follow::where('id',$req->id)->first();
        $follow->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
