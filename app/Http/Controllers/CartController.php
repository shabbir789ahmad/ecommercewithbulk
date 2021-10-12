<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{

      public function cart()
    {
        return view('cart');
    }
   public function getwishlist()
    {
        return view('wishlist');
    }
  
   

    public function addToCart($id,Request $req)
    {
         $color="";
        if($req->get('cartcolor'))
        {
            $color=$req->get('cartcolor');
        }
        echo $color;
        $product = Product::
        join('images','products.id','=','images.image_id')
        ->select('products.name','products.price','products.discount','products.detail','products.id','images.rimage','products.drop_id','products.detail')
        ->findorfail($id);
         // dd($product);
        $cart = session()->get('cart', []);
       
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'pid' => $product['id'],
                "drop_id" => $product['drop_id'],
                "name" => $product['name'],
                "detail" => $product['detail'],
                "ship" => $product['ship'],
                "quantity" => 1,
                "price" => $product->discount,
                "image" => $product->rimage,
                "color" => $req->color,
                "size" => $req->size,

            ];
            
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
   
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
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
            session()->flash('success', 'Product removed successfully');
        }
    }

    function wishlist($id,Request $req)
    {
         $product = Product::
        join('images','products.id','=','images.image_id')
        ->select('products.name','products.price','products.discount','products.detail','products.id','images.rimage','products.drop_id','products.detail')
        ->findorfail($id);
        $wishlist= session()->get('wishlist',[]);

       
        if(isset($wishlist[$id]))
        {
           $wishlist[$id]['quentity']++;
        }else{
            $wishlist[$id]=[
                "drop_id" => $product['drop_id'],
                "name" => $product['name'],
                "detail" => $product['detail'],
                "ship" => $product['ship'],
                "quantity" => 1,
                "price" => $product->discount,
                "image" => $product->rimage,
                "color" => $req->color,
            ];
        }
         session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Product added to Wishlist successfully!');
    }

    function updateWishlist(Request $req)
    {
        if($req->id && $req->quantity)
        {
            $wishlist=session()->get('wishlist');
            $wishlist[$req->id]["quantity"]=$req->quantity;
            session()->put('wishlist',$wishlist);
            session()->flash('success','Wishlist updated successfully');
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
            session()->flash('success', 'Product removed successfully');
        }
    }
}
