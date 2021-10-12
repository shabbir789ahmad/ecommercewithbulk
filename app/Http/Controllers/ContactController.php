<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    function contact(Request $req)
    {
        $req->validate([
          'name' =>'required',
          'email' =>'required',
          'phone' => 'required',
          'message' =>'required',
        ]);

        $contact=new Contact;
        $contact->name=$req->name;
        $contact->email=$req->email;
        $contact->phone=$req->phone;
        $contact->message=$req->message;

        $contact->save();

        return redirect()->back()->with('success','Thank You for your Message');
    }
}
