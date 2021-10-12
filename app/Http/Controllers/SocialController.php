<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\Mainpage;
class SocialController extends Controller
{
    function uploadLink(Request $req)
    {
        $req->validate([
         'facebook'=>'required',
         'twitter'=>'required',
         'instagram'=>'required',
         'linkdin'=>'required',
         'phone'=>'required',
         'email'=>'required',
         'address'=>'required',

        ]);

        $link= new Social;
        $link->facebook=$req->facebook;
        $link->twitter=$req->twitter;
        $link->instagram=$req->instagram;
        $link->linkdin=$req->linkdin;
        $link->phone=$req->phone;
        $link->email=$req->email;
        $link->address=$req->address;

        $link->save();
        return redirect()->back()->with('success','Social Links And Data Uploaded');
    }

    function showlink()
    {
        $link2=Social::paginate(10);
      return view('Dashboard.social-link-show',compact('link2'));
    }

    function deletelink($id)
    {
        $link=Social::findorfail($id);
          $link->delete();
        return redirect()->back()->with('success','Link and Data Deleted');
    }

      function updatelink($id)
    {
        $link2=Social::findorfail($id);
      return view('Dashboard.Social-link-update',compact('link2'));
    }

    function updateLink2(Request $req)
    {

        $link= Social::findorfail($req->id);
        $link->facebook=$req->facebook;
        $link->twitter=$req->twitter;
        $link->instagram=$req->instagram;
        $link->linkdin=$req->linkdin;
        $link->phone=$req->phone;
        $link->email=$req->email;
        $link->address=$req->address;

        $link->save();
        return redirect()->route('admin.show-link')->with('success','Social Links And Data updated');
    }


    function front(Request $req)
    {
        $req->validate([
         'c1'=>'required',
         'c2'=>'required',
         'c3'=>'required',
         'c4'=>'required',
         'c5'=>'required',
         

        ]);

        $link= new Mainpage;
        $link->c1=$req->c1;
        $link->c2=$req->c2;
        $link->c3=$req->c3;
        $link->c4=$req->c4;
        $link->c5=$req->c5;
      
        $link->save();
        return redirect()->back()->with('success',' Data Uploaded Successfully');
    }
    function showfront()
    {
        $main=Mainpage::paginate(10);
      return view('Dashboard.home_page_show',compact('main'));
    }
     function deleteFront($id)
    {
        $main=Mainpage::findorfail($id);
        $main->delete();
      return redirect()->back()->with('success','heading Deleted');
    }

     function updateFront($id)
    {
         $main=Mainpage::findorfail($id);
      return view('Dashboard.home_page_update',compact('main'));
     
    }
    function updateFront2(Request $req)
    {

        $link=  Mainpage::findorfail($req->id);
        $link->c1=$req->c1;
        $link->c2=$req->c2;
        $link->c3=$req->c3;
        $link->c4=$req->c4;
        $link->c5=$req->c5;
      
        $link->save();
        return redirect()->route('admin.get-front')->with('success',' Data Updated Successfully');
    }
}
