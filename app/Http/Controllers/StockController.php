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
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class StockController extends Controller
{

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
         return view('Dashboard.supplier_show',compact('supply'));
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
         return view('Dashboard.stock',compact('supply','main','brand'));
    }
     function getSupplier2()
    {
        $main = DB::table("categories")->pluck("category","id");
     $brand = Brand::all();
        $supply=Supply::all();
         return view('Dashboard.stock_bulk',compact('main','brand','supply'));
    }

    function newStock(Request $req)
    {
        $req->validate([
          
          'product' => 'required',
          'detail' => 'required',
          'drop_id' => 'required',
          'stock' => 'required|numeric',
          'price' => 'required|numeric',
          'sell_price' => 'required|numeric',
          'ship' => 'required|numeric',
         

        ]);

   DB::transaction(function() use($req){
      
       $stock= Stock::create([ 
           'product'=> $req->product,
           'detail'=>$req->detail,
           'product_status'=>'1',
           'drop_id'=>$req->drop_id,
        ]);
       
         Stock2::create([ 
           'stock'=> $req->stock,
           'price'=>$req->price,
           'sell_price'=>$req->sell_price,
           'ship'=>$req->ship,
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
     
          $n3 = sizeof($req->brand);
          for($i = 0;  $i < $n3; $i++)
           {
              $brand= Store::create([
            'brand' =>$req->brand[$i],
            'brand_status' =>'1',
            'brand_id' =>$stock->id,
            ]);
           }
        foreach($req->file('rimage') as $file)
           {
              
             Image::create([
             $ext=$file->getClientOriginalExtension(),
             $name=$file->getClientOriginalName(),
             $filename=$name,
             $file->move('uploads/img/', $filename),
             'rimage'=>$filename,
             'image_id'=> $stock->id,
              ]);
      
           }

       });

 return  redirect()->back()->with('success','New Stock Added');
    }

   function bulkStock(Request $req)
   {
     DB::transaction(function() use($req){
        
         $name=$req->product;
         for ($i=0; $i <count($name) ; $i++) { 
           $stock[]= Stock::create([ 
           'product'=> $req->product[$i],
           'detail'=>$req->detail[$i],
           'product_status'=>'1',
           'drop_id'=>$req->drop_id[$i],
        ]);
          
     }

     $items = array();
     foreach($stock as $st) {
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
      for ($i=0; $i <sizeof($brand) ; $i++) {
        foreach($items as $st)
          {  
           $is[]=$st['id'];
          }
           Store::create([ 
            'brand'=> $req->brand[$i],
            'brand_status'=> '1',
            'brand_id'=>$is[$i],
              
           ]);
         }

         
         //dd(sizeof($items));
      for ($i=0; $i <sizeof($items); $i++) {
            
         foreach($items as $it)
           {  
              $is[]=$it['id'];
           }
         
         foreach($req->file('rimage') as $file)
           {
             Image::create([
             $name=$file->getClientOriginalName(),
             $filename=$name,
             $file->move('uploads/img/', $filename),
             'rimage'=>$filename,
             'image_id'=> $is[$i],
              ]);
            }

         }

         
        
          

     });
   }


    public function getStock(Request $req)
    {    $main = Category::all();
         $supply=Supply::all();
         $supply2='';
         $stock2='';
         if($req->get('supply')!== Null)
         {
            $supply2=$req->get('supply');
         }
         if($req->get('stock1') !== Null)
         {
            $stock2=$req->get('stock1');
         }
         $drop2='';
    
     if($req->get('drop_category') !== Null)

     {
        $drop2=$req->get('drop_category');
     }
         //echo $stock2;
        $query=Stock::
         join('stock2s','stocks.id','=','stock2s.stock_id')
         
         ->select('stocks.product','stock2s.price','stock2s.sell_price','stock2s.stock','stock2s.discount','stocks.drop_id','stocks.id','stock2s.supply_id');
         if($supply2)
         {
            $query=$query->where('stock2s.supply_id',$supply2);
         }
         if($drop2)
        {
         $query=$query->where('stocks.drop_id', $drop2);
        }
          if($stock2 == 10 )
         {
            $query=$query->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == 20 )
         {
            $query=$query->where('stock2s.stock','>=',10)
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == 30 )
         {
            $query=$query->where('stock2s.stock','>=',20)
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == 40 )
         {
            $query=$query->where('stock2s.stock','>=',30)
            ->where('stock2s.stock','<=',$stock2);
            
         }
         if($stock2 == 50 )
         {
            $query=$query->where('stock2s.stock','>=',40)
            ->where('stock2s.stock','<=',$stock2);
            
         }
          if($stock2 == 60 )
         {
            $query=$query->where('stock2s.stock','>=',50);
            
         }
        
        $query=$query->paginate(10);
        $stock=$query;
        foreach($stock as $st)
        {
         $st->image=Image::where('image_id',$st->id)->take(1)->get();
         $st->supply=Supply::where('id',$st->supply_id)->take(1)->get();
        }
        
 
       //dd($stock);
        return view('Dashboard.stock_show',compact('stock','supply','main'));
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
   

    function stockDetail($id)
    {  
        $supply=Supply::all();
        $stock=Stock::findorfail($id);
       
        $image=Image::where('image_id', $id)->get();
        $colors=Color::where('filter_id', $id)->get();
        $size=Size::where('size_id', $id)->get();
        $store=Store::where('brand_id', $id)->get();
        $stock2=Stock2::where('stock_id', $id)->get();
        
        
        return view('Dashboard.stock_detail',compact('stock','image','colors','size','store','stock2','supply'));
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
}
