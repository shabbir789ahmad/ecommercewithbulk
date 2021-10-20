<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Store;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Stock2;
class PriceController extends Controller
{
    
     function deleteColor($id)
      {
      	$color=Color::findorfail($id);
      	$color->delete();
      	return redirect()->back()->with('color','Color Deleted Successfully');
      }
       function deleteSize($id)
      {
      	$size=Size::findorfail($id);
      	$size->delete();
      	return redirect()->back()->with('size','size Deleted Successfully');
      }

       function deleteBrand($id)
      {
      	$brand=Store::findorfail($id);
       // dd($brand);
      	$brand->delete();
      	return redirect()->back()->with('brand','Brand Deleted Successfully');
      }
      function deleteImage($id)
      {
        $image=Image::findorfail($id);
        $image->delete();
        return redirect()->back()->with('success','Image Deleted Successfully');
      }
      //function for update and add filter

      function updateStore(Request $req)
      {
      	$store=Store::findorfail($req->id);
      	$store->brand=$req->brand;
      	$store->brand_status=$req->brand_status;
      	$store->brand_id=$req->brand_id;
      	$store->save();
      	return redirect()->back()->with('brand','Brand Updated Successfully');
      }
       function addStore(Request $req)
      {

        $req->validate([
         'brand'=>'required',
         'brand_id'=>'required'
        ]);
        $store=new Store;
        $store->brand=$req->brand;
        $store->brand_status='1';
        $store->brand_id=$req->brand_id;
        $store->save();
        return redirect()->back()->with('brand','Brand Added Successfully');
      }
       function updateSize(Request $req)
      {
      	$size=Size::findorfail($req->id);
      	$size->size=$req->size;
      	$size->size_status=$req->size_status;
      	$size->size_id=$req->size_id;
      	$size->save();
      	return redirect()->back()->with('size','Size Updated Successfully');
      }
       function addSize(Request $req)
      {
        $req->validate([
         'size'=>'required',
         'size_id'=>'required'
        ]);
        $size=new Size;
        $size->size=$req->size;
        $size->size_status='1';
        $size->size_id=$req->size_id;
        $size->save();
        return redirect()->back()->with('size','Size Added Successfully');
      }

     function updateColor(Request $req)
      {
      	$color=Color::findorfail($req->id);
      	$color->color=$req->color;
      	$color->color_status=$req->color_status;
      	$color->filter_id=$req->filter_id;
      	$color->save();
      	return redirect()->back()->with('success2','Color Updated Successfully');
      }
    
     function addColor(Request $req)
      {
        $req->validate([
         'color'=>'required',
         'filter_id'=>'required'
        ]);
        $color=new Color;
        $color->color=$req->color;
        $color->color_status='1';
        $color->filter_id=$req->filter_id;
        //dd($color);
        $color->save();
        return redirect()->back()->with('success2','Color Added Successfully');
      }


      function updateImage(Request $req)
      {
        $img=new Image;
        if($req->hasfile('rimage'))
       {
          $file=$req->file('rimage');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/',$filename);
            $img->rimage=$filename;
       }
       
       //dd($img->rimage);
        $img->image_id=$req->image_id;
        $img->save();

        return redirect()->back()->with('success','Image Updated Successfully');
      }
    
     function deletedStock($id)
     {
      $stock=Stock::findorfail($id);
      $stock->delete();
      return redirect()->back()->with('success','Product Deleted ');
     }
     function deleteStock($id)
     {
      $stock=Stock2::findorfail($id);
      //dd($stock);
      $stock->delete();
      return redirect()->back()->with('success','Stock Deleted ');
     }

      function updateStock(Request $req)
    {
      $stock= Stock2::findorfail($req->id);
    
      $stock->price=$req->price;
      $stock->stock=$req->stock;
      $stock->ship=$req->ship;
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

}
