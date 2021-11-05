<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
class FollowController extends Controller
{
    
    public function create(Request $req)
    {
        $follow=Follow::where('user_id',$req->id)->get();
        if(!$follow)
        {
          $follow=Follow::create([
               'name' => $req->name,
               'image' => $req->image,
               'user_id' => $req->user_id,
               'follow' => $req->follow,
          ]);
        }else
        {
            echo "ffdfdff";
        }
        
    }

    
    public function unfollow(Request $request)
    {
        $follow=Follow::all();

        return ;
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
