<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Requests\StateRequest;
class StateController extends Controller
{
   function index()
   {
    $states=State::states();
    return view('Dashboard.state.index',compact('states'));
   }

   function create()
   {
    
    return view('Dashboard.state.create');
   }



   function store(StateRequest $request)
   {

     return \App\Helpers\Form::createEloquent(new State,$request->validated());
   }


   function edit(State $state)
   {
    return view('Dashboard.state.edit',compact('state'));
   }


   function update(StateRequest $request,$id)
   {

      return \App\Helpers\Form::updateEloquent(new State,$id,$request->validated());
   }


   function destroy( $id)
   {

     return App\Helpers\Form::deleteEloquent(new State,$id);
   }

    function states()
    {
        $states=State::states();
        return response()->json($states);
    }
}
