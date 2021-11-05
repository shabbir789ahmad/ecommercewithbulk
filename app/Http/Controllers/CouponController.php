<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Auth;
use session;
use Carbon\Carbon;
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
         'limit' =>'required|numeric',

        ]);

        $coupon=new Coupon;
        $coupon->code=$req->code;
        $coupon->value=$req->value;
        $coupon->type=$req->type;
        $coupon->min_order_amnt=$req->min_order_amnt;
        $coupon->exp_date=$req->exp_date;
        $coupon->limit=$req->limit;
        $coupon->coupon_status='1';
        $coupon->vendor_id=Auth::user()->id;

        $coupon->save();

        return redirect()->back()->with('success','Coupon Created');
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show()
    {
        $coupon=Coupon::latest()->where('vendor_id',Auth::user()->id)->paginate(10);
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
        $coupon->limit=$req->limit;
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

    function checkCoupon(Request $req)
    {
        $date=Carbon::now();
        if($req->coupon=='')
        {
         return redirect()->back();
        }else{
          
          $data=coupon::where('code',$req->coupon)->first();
          if (!$data) {
              return redirect()->back()->with('error','invalid Coupon');
          }else{

            if($data->exp_date<$date || $data->coupon_status==0)
            {
             return redirect()->back()->with('error','Coupon Expired');
            }else
            {
                $usage=CouponUsage::where('user_id',Auth::user()->id)->where('coupon_name',$data->code)->first();
                $limit=CouponUsage::where('coupon_name',$data->code)->count();

                if($usage && $usage->user_id==Auth::user()->id && $usage->coupon_name==$data->code || $limit >$data->limit)
                {
                    return redirect()->back()->with('error','Cannot Use Again');
                }else
                {
                    foreach(session('cart') as  $details)
                    {
                        $total='';
                      $total =(int) $details['price'] * $details['quantity'] + $details['ship'];
                    }
                    if($total >=$data->min_order_amnt)
                    {
                       $cusage=new CouponUsage;
                       $cusage->coupon_id=$data->id;
                       $cusage->coupon_name=$data->code;
                       $cusage->user_id=Auth::user()->id;
                       $cusage->save();
                    
                        if($data->type=='fixed')
                        {
                          session()->put('coupon',[
                            'code' =>$data->code,
                            'value' =>$data->value,
                           ]);
                        }else
                        {
                            $newprice=$data->value/100;
                            $pc=$newprice*$total;
                            session()->put('coupon',[
                            'code' =>$data->code,
                            'value' =>$pc,
                           ]);
                        }
                       
                       return redirect()->back();
                    }else
                    {
                        return redirect()->back()->with('error','minimum Order Should be'.$data->min_order_amnt);
                    }
                    
                }
                
            }
             
          }
       
        }
      
    }
   

}
