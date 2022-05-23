<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\User;
use session;
use App\Http\Traits\ProductTrait;
class CartController extends Controller
{
    
    use ProductTrait;
    public function cart()
    {
      return view('cart');
    }


   
   

    public function addToCart($id,Request $request)
    {
   
        $product = $this->detail($id);
      
        $cart = session()->get('cart', []);
       
        if(isset($cart[$id]))
         {
            $quentity=$cart[$id]['quantity']++;
            $cart[$id]['sub_total']=$cart[$id]['sub_total']*$quentity;
        
        }else {
            foreach($product->images as $image)
            {
                
                $image=$image['product_image'];
            }
            $cart[$id] = [
                'id' => $product['id'],
                "cat_id" => $product['subcategory_id'],
                "name" => $product['product_name'],
                "shipping_cost" => $product['shipping_cost'],
                "vendor_id" => $product['vendor_id'],
                "quantity" => $request->quantity,
                "price" => $product['discount_price'],
                "sub_total" => $product['discount_price'],
                "image" => $image,
                

            ];
            
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('successs', 'Product added to cart successfully!');
    }
  
   
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["sub_total"] = $request->quantity*$cart[$request->id]["price"];
            session()->put('cart', $cart);
            session()->flash('successs', 'Cart updated successfully');
        }
    }
  
    
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('successs', 'Product removed successfully');
        }
    }

    

   
}
