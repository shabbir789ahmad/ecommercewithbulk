<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
class FollowController extends Controller
{
    
    public function follow(Request $req)
    {
        $foll=Follow::where('user_id',$req->id)->get();
dd($req->id);
        if($foll==NUll || $foll=='')
        {
             Follow::create([
               'name' => $req->name,
               'image' => $req->image,
               'user_id' => $req->user_id,
               'follow_id' => $req->follow_id,
               'follow' => '1',
            ]);
        }else
        {
            echo "cannot follow";
        }
        
    }

    
    public function unfollow(Request $request)
    {
        $follow=Follow::all();

        return;
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
