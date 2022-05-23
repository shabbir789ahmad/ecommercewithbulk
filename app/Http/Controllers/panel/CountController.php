<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Contact;
use App\Models\Stock;
use App\Models\Sell;
use App\Models\Stock2;
use App\Notifications\ProductStock;
use Notification;
use App\Http\Traits\StoreTrait;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
class CountController extends Controller
{
    use StoreTrait;
    

    function count2()
    {
        $user=User::whereMonth('created_at', date('m'))->count();
        if($user)
        {
        $per=User::count();
        $pr=$user/$per * 100;
        }else{
            $pr=0;
        }

        $vendor=Vendor::whereMonth('created_at', date('m'))->count();
        if($vendor)
        {
        $per=Vendor::count();
        $pr2=$vendor/$per * 100;
        }else{
            $pr2=0;
        }
        
        $msg=Contact::whereDay('created_at', date('d'))->count();
         if($msg)
        {
        $ms=Contact::count();
        $msg2=$msg/$ms * 100;
        }else{
            $msg2=0;
        }

        $message=Contact::whereDay('created_at', date('d'))->take(10)->get();
      

    return view('Dashboard.dashboard',compact('user','vendor','message','pr','pr2','msg','msg2'));
    }
    
}
