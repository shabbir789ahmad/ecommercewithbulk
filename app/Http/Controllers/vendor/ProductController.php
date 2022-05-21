<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\StoreTrait;
use App\Http\Traits\ProductTrait;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Stock;
use App\Models\ProductBrand;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Image;

use Auth,DB;
class ProductController extends Controller
{
    use StoreTrait;
    use ProductTrait;

    public function index(Request $req)
    {
       $products=$this->products(Auth::id(),$subcategory_id='');
 
        return view('vendor.product.index',compact('products'));
    }

    function create()
    {
       $categories = Category::select("category","id")->get();
        $brands = Brand::all();
        $supply=Supplier::all();
     
      return view('vendor.product.create',compact('categories','brands','supply'));
    }


     function store(Request $req)
    {

        $req->validate([
          
          'product_name' => 'required',
          'detail' => 'required',
          'subcategory_id' => 'required',
          'stock' => 'required|numeric',
          'price' => 'required|numeric',
          'discount_price' => '',
          'shipping_cost' => 'required|numeric',
          'color' => 'required',
          'size' => 'required',
          'images' => 'required',
          
          ]);

   DB::transaction(function() use($req){
         
      $product= Product::create([ 
           'product_name'=> $req->product_name,
           'detail'=>$req->detail,
           'subcategory_id'=>$req->subcategory_id,
           'shipping_cost'=>$req->shipping_cost??null,
           'vendor_id'=>Auth::user()->id,
        ]);
       
         Stock::create([ 
           'stock'=> $req->stock,
           'price'=>$req->price,
           'discount_price'=>$req->discount_price,
           'product_id'=>$product->id,
        ]);
       
        $n = sizeof($req->color);
         for($i = 0; $i < $n; $i++) 
         {
            $color= ProductColor::create([
            'color' => $req->color[$i],
            'color_status' =>'1',
            'product_id' =>$product->id,
             ]);
           }
           
           
          $n2 = sizeof($req->size);
          for($i = 0;  $i < $n2; $i++)
           { 
            
            ProductSize::create([
           'size' =>$req->size[$i],
           'size_status' =>'1',
            'product_id' =>$product->id,
            ]);
           }
     
         if($req->brand)
         {
            $n3 = sizeof($req->brand);
          for($i = 0;  $i < $n3; $i++)
           {
            ProductBrand::create([
             'product_brand' =>$req->brand[$i],
             'brand_status' =>'1',
             'product_id' =>$product->id,
            ]);
           }
         }
          
        foreach($req->file('images') as $file)
           {
              $ext=$file->getClientOriginalExtension();
              $filename= time().rand(1,100).'.'.$ext;
              $file->move('uploads/img/',$filename);
             Image::create([
              'product_image'=>$filename,
              'product_id'=> $product->id,
              ]);
      
           }

       });

 return redirect()->back()->with('success','New Stock Added');
    }

}
