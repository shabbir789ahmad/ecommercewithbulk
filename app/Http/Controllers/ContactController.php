<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
   
   function index()
   {
      return view('contact_us');
   }

    function store(ContactRequest $request)
    {
        
       $contact= Contact::create($request->validated());
       return redirect()->back()->with('success','Thank You for your Message');
    }
}
