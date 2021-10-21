<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Mainpage;
use App\Models\Dropdown;
use App\Models\Image;
use Carbon\Carbon;
class SliderController extends Controller
{
  function  women()
  {
    
    $slider=Slider::latest()->take('3')->get();
    $front=Mainpage::latest()->take(1)->get();
     $query1= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating')
      ,'stocks.drop_id','stocks.id','stocks.product','stocks.created_at')
        ->groupBy('review_id','stocks.drop_id','stocks.id','stocks.product','stocks.created_at')->orderBy('rating','DESC');
      $query=$query1->whereMonth('stocks.created_at', date('m'));
      $query=$query1->where('product_status','1')->get();
       $prod1=$query;
        $product=$prod1->shuffle();

        $query2=$query1->where('product_status','1')->get();
        $prod3=$query2;
        $product3=$prod3->shuffle();
        //dd($produ);
      foreach($product as $pro) {
    
     $pro->image=Image::where('Image_id',$pro->id)->get();
      $pro->stock2=Stock2::where('stock_id',$pro->id)
         ->where('stock_status','1')->take(1)->get();
          
      }
      foreach($product3 as $prod) {
    
     $prod->image=Image::where('Image_id',$prod->id)->get();
      $prod->stock2=Stock2::where('stock_id',$prod->id)
         ->where('stock_status','1')->take(1)->get();
      
      }
     
  
        
    $prod= Stock::
      leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->leftjoin('stock2s','stocks.id','=','stock2s.stock_id')
      ->select('review_id', \DB::raw('avg(rating) as rating')
       ,'stocks.drop_id','stocks.id','stocks.product'    ,'reviews.review_id','stocks.created_at','stock2s.sell_price','stock2s.discount')
      ->groupBy('review_id','stocks.drop_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','stock2s.sell_price','stock2s.discount')->orderBy('rating','DESC')
      ->where('product_status','1')
      ->where('stock_status','1')
      ->get();
   $product2= $prod->shuffle();
    
      foreach($product2 as $pro) {
    
       $pro->image=Image::where('Image_id',$pro->id)->get();
   
      }
      $dropdown=Dropdown::all();
   //dd($product3);
      return view('home',compact('slider','product','product2','front','product3','dropdown'));
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
     try {
        $search=$req->search;
    $search2=Stock::join('images','stocks.id','=','images.image_id')
    ->where('product','LIKE',"%{$search}%")->get();

    } catch (\Exception $e) {
        return redirect()->back()->withError('Not data Found for Search ' . $request->input('search'))->withInput();
    }
    
 
    return view('search',compact('search2'));
  }

}
