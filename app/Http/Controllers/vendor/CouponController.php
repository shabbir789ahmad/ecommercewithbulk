<?php

namespace App\Http\Controllers\vendor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\CouponSave;
use App\Models\User;
use App\Models\Vendor;
use App\jobs\OrderJob;
use App\Mail\CouponMail;
use Auth;
use session;
use Illuminate\Support\Facades\Mail;
use App\Http\Traits\CouponTrait;
use Carbon\Carbon;

class CouponController extends Controller
{
    use CouponTrait;
    
    public function index()
    {
        $coupons=Coupon::coupons();
        return view('vendor.coupon.index',compact('coupons'));
    }

   public function create()
    {
   
        return view('vendor.coupon.create');
    }
 
    public function store(Request $req)
    {
        $req->validate([
        
         'value' =>'required',
         'min_order_amnt' =>'required',
         'exp_date' =>'required',
         'limit' =>'required|numeric',

        ]);
     
        $data=[
          
           'code' => $this->generateRandomString(8),
           'value' => $req->value,
           'min_order_amnt' => $req->min_order_amnt,
           'exp_date' => $req->exp_date,
           'limit' => $req->limit,
           'coupon_status' => '1',
           'vendor_id' => Auth::id(),
        ];

        return \App\Helpers\Form::createEloquent(new Coupon ,$data);
    }

   

   public function edit(Coupon $coupon)
    {
     
        return view('vendor.coupon.edit',compact('coupon'));
    }

    public function update(Request $req,$id)
    {
        $req->validate([
        
         'value' =>'required',
         'min_order_amnt' =>'required',
         'exp_date' =>'required',
         'limit' =>'required|numeric',

        ]);
     
        $data=[
          
           'code' => $this->generateRandomString(8),
           'value' => $req->value,
           'min_order_amnt' => $req->min_order_amnt,
           'exp_date' => $req->exp_date,
           'limit' => $req->limit,
           'coupon_status' => '1',
           'vendor_id' => Auth::id(),
        ];

        return \App\Helpers\Form::updateEloquent(new Coupon ,$id,$data);
    }

   
    public function destroy($id)
    {
         return \App\Helpers\Form::deleteEloquent(new Coupon ,$id);
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

    function saveCoupon(Request $req)
    {
        $cop=CouponSave::where('coupon_id',$req->id)->where('user_id',Auth::user()->id)->first();
        if(!$cop)
        {
            $save=new CouponSave;
        $save->coupon_id=$req->id;
        $save->code=$req->code;
        $save->vendor_id=$req->vendor_id;
        $save->user_id=Auth::user()->id;
        $save->save();
    }else
    {
     echo 'not done';
    }
    }

    function AllStore()
    {   
        $usid='';
        
         
         if(Auth::user())
        {
            $usid=Auth::user()->id;
        }
        
        $store=$this->getCoupon();
       $save=CouponSave::where('user_id',$usid)->get();

         //dd($store);
        return view('all_store',compact('store','usid','save'));
    }


   // generate unique coupon

public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
   

}
