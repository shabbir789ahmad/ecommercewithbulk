<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Sell;
use App\Models\Mainpage;
use App\Models\Dropdown;
use App\Models\Image;
use Carbon\Carbon;
use App\Http\Traits\StoreTrait;
class SliderController extends Controller
{
    use StoreTrait;

  
  function  women()
  {
   
    
    $slider=Slider::latest()->take('3')->get();
    $front=Mainpage::latest()->take('1')->get();
    $dropdown=$this->dropdown();
    $time=$this->carbon();
    $product= Vendor::
     join('stocks','vendors.id','=','stocks.user_id')
     ->join('stock2s','stocks.id','=','stock2s.stock_id')
     ->leftjoin('sponsers','stocks.id','=','sponsers.sponser_id')
     ->leftjoin('reviews','stocks.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
     ,'stocks.drop_id','stocks.id','stocks.product','stocks.created_at','vendors.deleted_at','stock2s.sell_price','stock2s.discount','stock2s.stock_status','sponsers.sponser','stocks.cat_id','sponsers.sponser_status','sponsers.sponser_end')
     ->groupBy('review_id','stocks.drop_id','stocks.id','stocks.product','stocks.created_at','vendors.deleted_at','sponsers.sponser','stock2s.sell_price','stock2s.discount','stock2s.stock_status','stocks.cat_id','sponsers.sponser_status','sponsers.sponser_end')->orderBy('rating','DESC')
     ->whereNull('vendors.deleted_at')
     ->where('product_status','1')->get()
     ->shuffle();

     foreach($product as $pro) 
     {
       $pro->image=Image::where('Image_id',$pro->id)->take('1')->get();
     }
   
    
  //dd($product);
        
    $product2= Vendor::
      join('stocks','vendors.id','=','stocks.user_id')
      ->join('stock2s','stocks.id','=','stock2s.stock_id')
      ->leftjoin('sales','stocks.id','=','sales.sale_id')
      ->leftjoin('reviews','stocks.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating')
       ,'stocks.drop_id','stocks.id','stocks.product'    ,'reviews.review_id','stocks.created_at','vendors.deleted_at','stocks.cat_id','stock2s.stock_status','sales.new_price','sales.discounts','sales.on_sale','sales.sell_id')
      ->groupBy('review_id','stocks.drop_id','stocks.cat_id','stocks.id','stocks.product','reviews.review_id','stocks.created_at','vendors.deleted_at','stock2s.stock_status','sales.new_price','sales.discounts','sales.on_sale','sales.sell_id')->orderBy('rating','DESC')
      ->where('product_status','1')
      ->where('on_sale','1')
      ->whereNull('vendors.deleted_at')
      ->get()->shuffle();
      
       foreach($product2 as $pro)
       {
        $pro->image=Image::where('Image_id',$pro->id)->get();
       }
   //dd($product);
      return view('home',compact('slider','product','product2','front','dropdown','time'));
  }

  function uploadSlider(Request $req)
  {
    $req->validate([
   'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=500,min_height=1000',
     'heading'=>'required|min:22|max:40',
    
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
     $slider->heading=$req->heading;
    $slider->save();
    return redirect()->back()->with('success','Slider has been Uploaded');
  }
   
   function slide()
   {
    $slider=Slider::all();
    return $slider;
   }

  function getSlider()
  {
    $slider=$this->slide();

    return view('Dashboard.get_slider',compact('slider'));
  }

  function deleteSlider($id)
  {
    $slider=Slider::findorfail($id);
     if($slider->image)
     {
      unlink('uploads/img/' .$slider->image);
     }
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
    $logos=Logo::all();
      //dd($logo);
    return view('Dashboard.logo_show',compact('logos'));
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
    //dd($slider);
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
