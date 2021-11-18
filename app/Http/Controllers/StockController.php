<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Stock2;
use App\Models\Supply;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Color;
use App\Models\Size;
use App\Models\Store;
use App\Models\Sponser;
use App\Models\Category;
use Carbon\Carbon;
use Auth;
use App\Http\Traits\StoreTrait;
use Illuminate\Support\Facades\DB;
class StockController extends Controller
{
 use StoreTrait;
    function Add(Request $req)
    {
        $req->validate([
          
          'supplier_name' => 'required',
          'address' => 'required',
          'phone' => 'required|numeric',
         
        ]);
         $supply= Supply::create([ 
           'supplier_name'=> $req->supplier_name,
           'address'=> $req->address,
           'phone'=> $req->phone,       
           
           ]);
           return  redirect()->back()->with('success','New Supplier Added');

    }
    function showSupplier()
    {
        $supply=Supply::paginate(10);
         return view('vendor.supplier_show',compact('supply'));
    }
    function deleteSupplier($id)
    {
        $supply=Supply::findorfail($id);
        $supply->delete();
        return  redirect()->back()->with('success','Supplier Deleted');
    }
    function getSupplier()
    {
        $main = DB::table("categories")->pluck("category","id");
     $brand = Brand::all();
        $supply=Supply::all();
         return view('vendor.stock',compact('supply','main','brand'));
    }
     function getSupplier2()
    {
        $main = DB::table("categories")->pluck("category","id");
     $brand = Brand::all();
        $supply=Supply::all();
         return view('vendor.stock_bulk',compact('main','brand','supply'));
    }

    function newStock(Request $req)
    {
        $req->validate([
          
          'product' => 'required',
          'detail' => 'required',
          'drop_id' => 'required',
          'cat_id' => 'required',
          'stock' => 'required|numeric',
          'price' => 'required|numeric',
          'sell_price' => 'required|numeric',
          'ship' => 'required|numeric',
          'color' => 'required',
          'size' => 'required',
          
          ]);

   DB::transaction(function() use($req){
         
         $filename='';
      if ($req->hasfile('size_image')) {
          $file=$req->file('size_image');
          $ext=$file->getClientOriginalExtension();
          $filename= time().rand(1,100).'.'.$ext;
          $file->move('uploads/img/',$filename);
        }
       
     
       $stock= Stock::create([ 
           'product'=> $req->product,
           'detail'=>$req->detail,
           'size_image'=>$filename,
           'product_status'=>'1',
           'drop_id'=>$req->drop_id,
           'cat_id'=>$req->cat_id,
           'vendor_id'=>Auth::user()->id,
        ]);
       
         Stock2::create([ 
           'stock'=> $req->stock,
           'price'=>$req->price,
           'sell_price'=>$req->sell_price,
           'ship'=>$req->ship,
           'stock_status'=>'1',
           'supply_id'=>$req->supply_id,
           'stock_id'=>$stock->id,
        ]);
       
        $n = sizeof($req->color);
         for($i = 0; $i < $n; $i++) 
         {
            $color= Color::create([
            'color' => $req->color[$i],
            'color_status' =>'1',
            'filter_id' =>$stock->id,
             ]);
           }
           
           
          $n2 = sizeof($req->size);
          for($i = 0;  $i < $n2; $i++)
           { 
            
            $brand= Size::create([
           'size' =>$req->size[$i],
           'size_status' =>'1',
            'size_id' =>$stock->id,
            ]);
           }
     
         if($req->brand)
         {
            $n3 = sizeof($req->brand);
          for($i = 0;  $i < $n3; $i++)
           {
            $brand= Store::create([
             'brand' =>$req->brand[$i],
             'brand_status' =>'1',
             'brand_id' =>$stock->id,
            ]);
           }
         }
          
        foreach($req->file('rimage') as $file)
           {
              $ext=$file->getClientOriginalExtension();
              $filename= time().rand(1,100).'.'.$ext;
              $file->move('uploads/img/',$filename);
             Image::create([
              'rimage'=>$filename,
              'image_id'=> $stock->id,
              ]);
      
           }

       });

 return redirect()->back()->with('success','New Stock Added');
    }

 function bulkStock(Request $req)
   {

     DB::transaction(function() use($req){
           
           foreach($req->file('size_image') as $file)
           {
            $ext=$file->getClientOriginalExtension();
           $filename= time().rand(1,100).'.'.$ext;
           $file->move('uploads/img/',$filename);
           }
           
           $name=$req->product;
          for ($i=0; $i <count($name) ; $i++) 
          { 
            $stock[]= Stock::create([ 
            'product'=> $req->product[$i],
            'detail'=>$req->detail[$i],
            'size_image'=>$filename,
            'product_status'=>'1',
            'drop_id'=>$req->drop_id[$i],
           ]);
          }

          $items = array();
          foreach($stock as $st)
          {
           $items[] = $st;
          }
          
          $detail=$req->stock;
          for ($i=0; $i <sizeof($detail) ; $i++) {
          foreach($items as $st)
           {  
           $is[]=$st['id'];
           }
          Stock2::create([ 
            'stock'=> $req->stock[$i],
            'price'=>$req->price[$i],
            'sell_price'=>$req->sell_price[$i],
            'stock_status'=>'1',
            'ship'=>$req->ship[$i],
            'supply_id'=>$req->supply_id[$i],
            'stock_id'=>$is[$i],
              
           ]);
         }
         $color=$req->color;
         for ($i=0; $i <sizeof($color) ; $i++) {
         foreach($items as $st)
          {  
           $is[]=$st['id'];
          }
         Color::create([ 
            'color'=> $req->color[$i],
            'color_status'=> '1',
            'filter_id'=>$is[$i],
              
           ]);
         }
     
         $size=$req->size;
         for ($i=0; $i <sizeof($size) ; $i++) {
         foreach($items as $st)
          {  
           $is[]=$st['id'];
          }
         Size::create([ 
            'size'=> $req->size[$i],
            'size_status'=> '1',
            'size_id'=>$is[$i],
              
           ]);
         }

       $brand=$req->brand;
     // dd(sizeof($brand));
         for ($j=0; $j <sizeof($brand) ; $j++) {
     
         foreach($items as $st)
          {  
           $is[]=$st['id'];
            
          }
          
          Store::create([ 
            'brand'=> $req->brand[$j],
            'brand_status'=> '1',
            'brand_id'=>$is[$j],
              
           ]);
       
        }
        //dd($req->file('rimage'));
        foreach($req->file('rimage') as $file)
         {
           $ext=$file->getClientOriginalExtension();
           $filename= time().rand(1,1000).'.'.$ext;
           $file->move('uploads/img/',$filename);
             foreach($items as $it)
               {  
                $is[]=$it['id'];
                Image::create([
            'rimage'=>$filename,
            'image_id'=> $is[$i],
            ]);
               }
          
            

          }
         
        

        });
    }


    public function getStock(Request $req)
    {
        $id=Auth::user()->id;
        $main = $this->category();
        $supply=$this->supply();
        $stock=$this->products($id);
 
       
        return view('vendor.stock_show',compact('stock','supply','main'));
    }
   
    function sponserStatus(Request $req)
    {
        $sponser= Sponser::findorfail($req->id);
        $sponser->sponser_status=$req->sponser_status;
        
       // dd($sponser);
        $sponser->save();
      
    
    }
    function sponserProduct2(Request $req)
    {
        $req->validate([
         'sponser'=>'required',
         'sponser_id'=>'required',
         'sponser_start'=>'required',
         'sponser_end'=>'required'
        ]);

       $sponser=new Sponser;
        $sponser->sponser=$req->sponser;
        $sponser->sponser_id=$req->sponser_id;
        $sponser->sponser_start=$req->sponser_start;
        $sponser->sponser_end=$req->sponser_end;
        $sponser->sponser_status='0';
        $sponser->save();
        $req->session()->flash('success', 'Product Promotion Sent to Admin ');
        return redirect()->back();
   
        
    }

    function adminProduct($id)
    {
        $main = $this->category();
        $supply=$this->supply();
        $stock=$this->products($id);
        $time=$this->carbon();
        //dd($stock);
      return view('Dashboard.vendor_product',compact('stock','supply','main','time'));
    }

    function updateSell(Request $req)
    {
      $stock=Stock2::findorfail($req->id);
      $stock->sell_price=$req->sell_price;

      
      if($stock->save())
      {
        return redirect()->back()->with('success',' Selling Price Update Successfuly');
    }else
    {

      return redirect()->back()->with('message',' Problem Updating price');
    }
    }
    function updateDiscount(Request $req)
    {
      $stock=Stock2::findorfail($req->id);
      
      $stock->discount=$req->discount;
      if($stock->save())
      {
        return redirect()->back()->with('success',' Selling Price Update Successfuly');
    }else
    {

      return redirect()->back()->with('message',' Problem Updating price');
    }
    }
    function updateStock(Request $req)
    {
      $stock=new Stock2;
     //dd($stock);
      $stock->price=$req->price;
      $stock->stock=$req->stock;
      $stock->ship=$req->ship;
      $stock->stock_status='1';
      $stock->sell_price=$req->sell_price;
      $stock->stock_id=$req->stock_id;
      $stock->supply_id=$req->supply_id;

     
      if($stock->save())
      {
        return redirect()->back()->with('success',' Stock Update Successfuly');
    }else
    {

      return redirect()->back()->with('message',' Problem Updating price');
    }
    }

    function stockDetail($id)
    {  
        $supply=Supply::all();
        $stock=Stock::findorfail($id);
       
        $image=Image::where('image_id', $id)->get();
        $colors=Color::where('filter_id', $id)->get();
        $size=Size::where('size_id', $id)->get();
        $store=Store::where('brand_id', $id)->get();
        $stock2=Stock2::where('stock_id', $id)->get();
       
        return view('vendor.stock_detail',compact('stock','image','colors','size','store','stock2','supply'));
    }

    function updateDetail(Request $req)
    {
        $stock=Stock::findorfail($req->id);
        $stock->product=$req->product;
        $stock->detail=$req->detail;
        $stock->drop_id=$req->drop_id;
        $stock->save();
        return redirect()->back()->with('success',' Product Name And Detail Updated ');
    }

    function searchStock(Request $req)
    {
        $search=$req->search;
 
        $query=Stock::
        select('stocks.product','stocks.detail','stocks.drop_id','stocks.product_status','stocks.id')
        ->where('product','LIKE','%'.$search.'%')->get();
          $stock=$query;
          foreach($stock as $st)
        {
         $st->image=Image::where('image_id',$st->id)->take(1)->get();
         $st->stock2=Stock2::where('stock_id',$st->id)
         ->where('stock_status','1')->take(1)->get();
         $st->total=Stock2::where('stock_id',$st->id)
         ->sum('stock');
          $st->count=Stock2::where('stock_id',$st->id)
         ->count();

        }
       
        
            return view('vendor.search',compact('stock'));
         
       
    }
}
