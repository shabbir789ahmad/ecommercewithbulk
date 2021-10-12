<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Mainpage;
use App\Models\Image;
use Carbon\carbon;
class SliderController extends Controller
{
  function  women()
  {
    $slider=Slider::latest()->take('3')->get();
    
    $product= Stock::
     
      join('reviews','stocks.id','=','reviews.review_id')
     
      ->select('review_id', \DB::raw('avg(rating) as rating')
      ,'stocks.drop_id','stocks.id','stocks.product','stocks.created_at')
      ->groupBy('review_id','stocks.drop_id','stocks.id','stocks.product','stocks.created_at')->orderBy('rating','DESC')
      ->where('product_status','1')
      ->get();
      foreach($product as $pro) {
    
     $pro->image=Image::where('Image_id',$pro->id)->get();
      
      }
     // dd($product);
        
    $product2= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      
      ->select('review_id', \DB::raw('avg(rating) as rating')
       ,'stocks.drop_id','stocks.id','stocks.product'    ,'reviews.review_id','stocks.created_at')
      ->groupBy('review_id','stocks.drop_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at')->orderBy('rating','DESC')
       ->where('product_status','1')
      ->get();
   
    
      foreach($product2 as $pro) {
    
       $pro->image=Image::where('Image_id',$pro->id)->get();
      
      }

      //dd($img);
    

    $front=Mainpage::latest()->take(1)->get();
    //dd($front);
    return view('home',compact('slider','product','product2','front'));
  }

 


  function uploadSlider(Request $req)
  {
    $req->validate([
     'image'=>'required',
    
    ]);
    if($req->hasfile('image'))
    {
       $slider=new Slider;
      $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->image=$filename;
    }
    
    $slider->save();
    return redirect()->back()->with('success','Slider has been Uploaded');
  }

  function getSlider()
  {
    $slider=Slider::all();

    return view('Dashboard.get_slider',compact('slider'));
  }

  function deleteSlider($id)
  {
    $slider=Slider::findorfail($id);
    
    $slider->delete();

    return redirect()->back()->with('success',"Slider has been Deleted");
  }
  function updateSlider($id)
  {
    $slider=Slider::findorfail($id);
   return view('Dashboard.slider_update',compact('slider'));
  }

  function updateSlider2(Request $req)
   {
    $req->validate([
     'image'=>'required',
     
    ]);

     $slider=Slider::findorfail($req->id);
    
    if($req->hasfile('image'))
    {
      
         $file=$req->file('image');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $slider->image=$filename;
    }
   
    $slider->save();
    return redirect()->route('admin.get-slider')->with('success','Slider has been Updated');
  }


  function Logo(Request $req)
  {
    $req->validate([
     'logo'=>'required',
    
    ]);
    if($req->hasfile('logo'))
    {
       $slider=new Logo;
      $file=$req->file('logo');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->logo=$filename;
    }
    
    $slider->save();
    return redirect()->back()->with('success','Logo has been Uploaded');
  }

  function getLogo()
  {
    $logo=Logo::all();
      //dd($logo);
    return view('Dashboard.logo_show',compact('logo'));
  }

  function deleteLogo($id)
  {
    $logo=Logo::findorfail($id);
    
    $logo->delete();

    return redirect()->back()->with('success',"Logo has been Deleted");
  }
    function updateLogo($id)
  {
    $slider=Logo::findorfail($id);
   return view('Dashboard.logo_update',compact('slider'));
  }


  function updateLogo2(Request $req)
   {
    $req->validate([
     'image'=>'required',
     
    ]);

     $logo=Logo::findorfail($req->id);
    
    if($req->hasfile('logo'))
    {
      
         $file=$req->file('logo');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $slider->logo=$filename;
    }
   
    $logo->save();
    return redirect()->route('admin.get-logo')->with('success','Logo has been Updated');
  }

  function search(Request $req)
  {
    $search=$req->search;
    $search2=Product::join('images','stocks.id','=','images.image_id')
    ->where('name','LIKE',"%{$search}%")->get();
  //dd($search2);
    return view('search',compact('search2'));
  }

}
