<?php
namespace App\Http\Controllers\panel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Slider;

use App\Http\Traits\StoreTrait;
use App\Http\Traits\CouponTrait;
use App\Http\Traits\ImageTrait;

class SliderController extends Controller
{
    use StoreTrait;
    use CouponTrait;
    use ImageTrait;

  
   function index()
   {
       $sliders=Slider::all();

       return view('Dashboard.slider.index',compact('sliders'));
   }

   function create()
   {

    return view('Dashboard.slider.create');

   }

  function store(Request $req)
  {
    $req->validate([
   'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:6048',
   'slider_detail'=>'required',
    ]);
   
     $data=[
        'slider_detail'=>$req->slider_detail,
        'image'=>$this->image(),

     ];

     return \App\Helpers\Form::createEloquent(new Slider, $data);
    
  }
   
  
  function edit($id)
  {
    $slider=Slider::findorfail($id);
   return view('Dashboard.slider.edit',compact('slider'));
  }
 
  function update(Request $req,$id)
   {
    $req->validate([
   'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:6048',
   'slider_detail'=>'required',
    ]);
   
     $data=[
        'slider_detail'=>$req->slider_detail,
        'image'=>$this->image(),

     ];

     return \App\Helpers\Form::updateEloquent(new Slider, $id,$data);
    
  }

  function destroy($id)
  {
     return \App\Helpers\Form::deleteEloquent(new Slider, $id);
  }
  

  




 

}
