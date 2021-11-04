<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
class CouponController extends Controller
{
    
    public function index()
    {
        return view('vendor.coupon_upload');
    }

 
    public function create(Request $req)
    {
        $req->validate([
         'code' =>'required|unique:coupons',
         'value' =>'required',
         'type' =>'required',
         'min_order_amnt' =>'required',
         'exp_date' =>'required',

        ]);

        $coupon=new Coupon;
        $coupon->code=$req->code;
        $coupon->value=$req->value;
        $coupon->type=$req->type;
        $coupon->min_order_amnt=$req->min_order_amnt;
        $coupon->exp_date=$req->exp_date;
        $coupon->coupon_status='1';

        $coupon->save();

        return redirect()->back()->with('success','Coupon Created');
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show()
    {
        $coupon=Coupon::latest()->paginate(10);
        return view('vendor.coupon_show',compact('coupon'));
    }

    
    public function status(Request $req)
    {
        $coupon=Coupon::findorfail($req->id);
        $coupon->coupon_status=$req->coupon_status;
        $coupon->save();
    }

   
    public function update(Request $req)
    {
        $coupon=Coupon::findorfail($req->id);
        $coupon->value=$req->value;
        $coupon->min_order_amnt=$req->min_order_amnt;
        $coupon->exp_date=$req->exp_date;
        $coupon->save();
        return redirect()->back()->with('success','Coupon Updated Successfully');
    }

    
    public function destroy($id)
    {
        $coupon=Coupon::findorfail($id);
        $coupon->delete();
        return redirect()->back()->with('success','Coupon Deleted Successfully');
    }
     public function delete(Request $req)
    {   
         $id=$req->id;
       
         foreach($id as $idsa)
         {
            $coupon=Coupon::where('id',$idsa)->delete();
         }
          return response()->json(['success'=>"Products Deleted successfully."]);
       
    }
   

}
