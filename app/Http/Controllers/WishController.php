<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ProductTrait;
class WishController extends Controller
{
     use ProductTrait;
    
   public function index()
    {
        return view('wishlist');
    }
  

    function store(Request $req)
    {   
        $id=$req->id;
          $product = $this->detail($id);
      
        $wishlist = session()->get('wishlist', []);
       
        if(isset($wishlist[$id]))
         {
            $quentity=$wishlist[$id]['quantity']++;
            $wishlist[$id]['sub_total']=$wishlist[$id]['sub_total']*$quentity;
        
        }else {
            foreach($product->images as $image)
            {
                
                $image=$image['product_image'];
            }
            $wishlist[$id] = [
                'id' => $product['id'],
                "cat_id" => $product['subcategory_id'],
                "name" => $product['product_name'],
                "shipping_cost" => $product['shipping_cost'],
                "vendor_id" => $product['vendor_id'],
                "quantity" => 1,
                "price" => $product['discount_price'],
                "sub_total" => $product['discount_price'],
                "image" => $image,
                

            ];
            
        }
          
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('successs', 'Product added to wishlist successfully!');
    }


     function destroy(Request $request,$id)
    {
       if($request->id) {
            $wishlist = session()->get('wishlist');
            if(isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success3', 'Product removed successfully');
        }
    }
}
