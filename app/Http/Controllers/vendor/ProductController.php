<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ProductTrait;
use App\Helpers\ProductHelper;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Stock;
use App\Models\Color;
use App\Models\Size;
use App\Models\Image;


use Auth,DB;
class ProductController extends Controller
{

    use ProductTrait;

    public function index(Request $req)
    {
       $products=$this->products(Auth::id(),$subcategory_id='');
      // dd($products);
        return view('vendor.product.index',compact('products'));
    }

    function create()
    {
       $categories = Category::select("category","id")->get();
        $brands = Brand::all();
        $colors=Color::all();
        $sizes=Size::all();
     
      return view('vendor.product.create',compact('categories','brands','colors','sizes'));
    }


    function store(Request $req,ProductHelper $newproduct)
    {

       $req->validate([
          
          'product_name' => 'required',
          'detail' => 'required',
          'subcategory_id' => 'required',
          'stock' => 'required|numeric',
          'price' => 'required|numeric',
          'discount_price' => '',
       
          'color' => 'required',
          'size' => 'required',
          'images' => 'required',

         ]);


      DB::transaction(function() use($req,$newproduct)
      {
         
         /*
           * From ProductHelper class In Helper Folder
          */

           $product=$newproduct->createProduct($req); 
           $newproduct->createStock($req,$product); 
           $newproduct->createColors($req,$product);
           $newproduct->createSizes($req,$product);
           $newproduct->createBrands($req,$product); 
           $newproduct->createImages($req,$product); 
       });

        return redirect()
             ->route('product.index')
            ->with('success','New Product Created');
    }


    function destroy($id)
    {
        $this->unlinkImages($id);
        Product::destroy($id);
        
        return redirect()
             ->back()
             ->with('success','product Deleted');
    }

    function unlinkImages($id)
    {
        $images=Image::where('product_id',$id)->get();
        foreach($images as $image)
        {
            
          unlink('uploads/img/'.$image['product_image']);
          
        }
    }

}
