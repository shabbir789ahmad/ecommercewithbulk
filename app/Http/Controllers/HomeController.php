<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Review;
use App\Models\Size;
use App\Models\ProductBrand;
use App\Models\UserAddress;
// use App\Models\ProductSize;
// use App\Models\ProductColor;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\CouponTrait;
use App\classes\NewSale;
use Auth;
use Illuminate\Http\Response;
class HomeController extends Controller
{

    use ProductTrait;
    function index()
    {   
        //  class for sale function
        $sales=new NewSale;
        $sale=$sales->singlesale();
        // from slider model
        $sliders=Slider::sliders();
        // from subcategory Model
        $subcategories=SubCategory::subcategories();
        // from product traits
        $products=$this->products($id='',$subcategory_id='');
       
       return view('home',compact('sliders','sale','products','subcategories'));
    }


   function productDetail($id)
  {
    // from product trait
    $product_detail=$this->detail($id);

    $products=$this->products($vendor_id='',$product_detail['subcategory_id']);
   $address=$this->userAddress();

   //*  
    /*put product id in session
    /*
    /* for reciently viewed product
    */
   $this->recentlyViewed($id);
    
    $coupon=[];

    return view('product_detail',compact('product_detail','products','coupon','address'));
  } 


  function allProductBySubCategory($id, Request $req)
  {
   
    $products=$this->products($vendor_id='',$id);
    $brand=[];
    $colors=Color::all();
    $sizes=Size::all();
  
      // dd($products);
    return view('product',compact('products','brand','colors','sizes'));
  }


  function allProduct( Request $req)
  {
   
    $products=$this->products($vendor_id='',$id='');
    $brand=[];
    $colors=Color::all();
    $sizes=Size::all();
  
      // dd($products);
    return view('product',compact('products','brand','colors','sizes'));
  }






  function search(Request $req)
  {
     try{
           $search=$req->search;
           $search2=Stock::join('stock2s','stocks.id','=','stock2s.stock_id')
           ->where('product','LIKE',"%{$search}%")->get();
       
          foreach($search2 as $search)
          {
            $search->image=Image::where('image_id',$search['id'])-> take(1)->get();
      
           }
        } catch (\Exception $e) {
        return redirect()->back()->withError('Not data Found for Search ' . $request->input('search'))->withInput();
    }
    
 
    return view('search',compact('search2'));
  }


  function userAddress()
  {
    if(Auth::id())
    {
      $address=UserAddress::where('user_id',Auth::id())->first();
    }else
    {
      $address=null;
    }
    return $address;
  }


 
    public function recentlyViewed($id)
    {
        
        $products=session()->get('products',[]);
        
        if(Auth::user())
        {
            if(isset($products[$id]))
           { }else
             {
            
               $products[$id] = [
                
                 'id'=>Auth::id(),
                 'product_id'=>$id,

               ];
            
             }
          
        $car=session()->put('products', $products);
        } 
       

   }

   

}
