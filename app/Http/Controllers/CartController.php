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


    public function getwishlist()
    {
        return view('wishlist');
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

    function wishlist($id,Request $req)
    {
         $product = Stock::
        join('stock2s','stocks.id','=','stock2s.stock_id')
       ->join('images','stocks.id','=','images.image_id')
        ->select('stocks.product','stock2s.sell_price','stock2s.discount','stocks.detail','stocks.id','images.rimage','stocks.drop_id','stock2s.ship')
        ->findorfail($id);
        $wishlist= session()->get('wishlist',[]);

       
        if(isset($wishlist[$id]))
        {
           $wishlist[$id]['quentity']++;
        }else{
            $wishlist[$id]=[
                'pid' => $product['id'],
                "drop_id" => $product['drop_id'],
                "name" => $product['product'],
                "detail" => $product['detail'],
                "ship" => $product['ship'],
                "quantity" => 1,
                "price" => $product->sell_price -$product->discount,
                "image" => $product->rimage,
                "color" => $req->color,
                "size" => $req->size,
            ];
        }
         session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success3', 'Product added to Wishlist successfully!');
    }

    function updateWishlist(Request $req)
    {
        if($req->id && $req->quantity)
        {
            $wishlist=session()->get('wishlist');
            $wishlist[$req->id]["quantity"]=$req->quantity;
            session()->put('wishlist',$wishlist);
            session()->flash('success3','Wishlist updated successfully');
        }
 
    }
    function removeWish(Request $request)
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
