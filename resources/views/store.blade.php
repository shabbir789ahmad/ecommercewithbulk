@extends('master.master')
@section('content')
<?php 
use App\Models\Category;
$sub=Category::category();
//echo "<pre>"; print_r($sub);die;
?>

@foreach($banner as $bann)
<div class="store-banner">
 <img src="{{asset('uploads/img/' .$bann['banner'])}}"  >
  <div class="follow-this">
    @foreach($products as $pro)
    @if($loop->first)
    <h4 class="">Store Name</h4>
    <p class="best"><span class="p-1 ">{{$pro->follow}}</span> Follower</p>
   
    <div class="message-follow  d-flex justify-content-center">
     <p class="mr-4 "><i class="fas fa-sms fa-2x ml-3 "></i><br>Message</p>
       @if($pro->follows==null)
      @if($loop->first )
     <p class=" follow ml-5" data-id="@if($pro->follows) $pro->follows->id @else 0 @endif" data-uid="@if(Auth::user()) Auth::id() @endif"   data-follow="{{$pro['user_id']}}"><i class="far fa-user fa-2x ml-3" ></i><br>Follow</p>
     @endif
     @else
 
     <p class=" unfollow ml-5 " data-uid="{{Auth::user()->id}}" data-id="{{$pro->follows->id}}"  data-follow="{{$pro['user_id']}}"><i class="far fa-user text-warning fa-2x ml-3" ></i><br>Following</p>
     @endif
      @endif
     @endforeach
    </div>

  </div>
</div>

@endforeach

<div class="container coupon-show mt-5 bg-dark">
 <div class="row">
  @Auth
  @foreach($coupon as $coup)
  <div class="col-md-4 col-12">
    <div class="coupon">
       <img src="{{asset('pic/TB1qraZvXP7gK0jSZFjXXc5aXXa-345-188.png')}}" width="100%" class="mt-3 mb-3">
       @if($coup['type']=='fixed')
         <p class="cpn-p1">Rs. {{$coup['value']}} OFF</p>
       @else
       <p class="cpn-p1">{{$coup['value']}}% OFF</p>
       @endif
       @if($coup['min_order_amnt'])
         <p class="cpn-p2">Min {{$coup['min_order_amnt']}} Spend</p>
       @else
       <p class="cpn-p2">NO min Spend</p>
       @endif
       @if($coup->save)
        @if($coup->save->coupon_id==$coup['id'] && $coup->save->user_id==$usid)
        <button class=" spn-btn btn get-coupon bg-dark" disabled>Collected</button>
        @else
        <button class=" spn-btn  btn  get-coupon" data-id="{{$coup['id']}}" data-code="{{$coup['code']}}"  data-vendor="{{$coup['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">{{$coup['value']}}</button>
        @endif
        @else
          <button class=" spn-btn btn get-coupon" data-id="{{$coup['id']}}" data-code="{{$coup['code']}}"  data-vendor="{{$coup['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">{{$coup['value']}}</button>
        @endif
    </div>
  </div>
 @endforeach
 @else
 <p class="text-light mt-3 ml-3">Login to view Coupon</p>
 @endAuth
 </div>
</div>


<h4 class=" pro mt-5">All Products</h4>
 @if($vendorsale)
   @foreach($vendorsale as $sal)
    @if($sal['sale_end']>=$date)
     <div class="card-heade border mt-5 d-inline-block rounded-top  py-3 w-100" style="overflow:hidden">
      <div class="row">
        <div class="col-md-6">
         <div class="sale">
      @foreach($vendorsale as $sal)
        <h2 class="font-weight-bold ml-3 text-dark ">{{ucwords($sal['sale_name'])}}</h2>
       
     @endforeach
    </div>
        </div>
        <div class="col-md-6">
         <div class="d-flex ml-auto">
        <p class="ml-auto text-dark font-weight-bold">Sale End In 
         <div id="time mr-5" class="d-flex ml-5">
          <p id="day" class="p-1 bg-time ml-2  text-light">f</p>
          <p id="hour" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="minute" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="second" class="p-1 bg-time ml-2 text-light">f</p>
         </div>
       </p>
       </div>
        </div>
      </div>
      
    
   </div>
  @endif
  @endforeach
  @endif 

  <div class=" d-flex store-nav-color" >
   <div class="nav-btn ml-3">
     <div class="nav-links">
      <ul>
       <li class="nav-link fhg" style="--i: .85s">
        <a href="#">Category<i class="fas fa-caret-down"></i></a>
         <div class="dropdown">
          <ul>
            @foreach($sub as $cat)
            <li class="dropdown-link" >
             <a href="#">{{ucwords($cat['category'])}}<i class="fas fa-caret-down"></i></a>
              <div class="dropdown second">
               <ul>
                @foreach($cat['subcat'] as $subc)
                <li class="dropdown-link">
                 <a href="#">{{ucwords($subc['smenue'])}}<i class="fas fa-caret-down"></i></a>
                 <div class="dropdown second">
                 <ul>

                  @php //dd($c->dropdown); @endphp
                  @foreach($cat['drop'] as $drp)
                  @if($subc['id']==$drp['dropdown_id'] )
                  <li class="dropdown-link store-drop"  value="{{$drp['id']}}">
                   <a >{{ucwords($drp['name'])}}</a>
                  </li>
                   @endif
                 
                  @endforeach
                  <div class="arrow"></div>
               </ul>
              </div>
            </li>
            @endforeach
            <div class="arrow"></div>
          </ul>
        </div>
       </li>
       @endforeach
       <div class="arrow"></div>
     </ul>
    </div>
   </li>
  </ul>
</div>
</div>

<button class="btn-store ml-1" id="new" value="new">New Product</button>
<button class="btn-store ml-1" id="top-rated" value="top">Top Rated</button>

</div>

<div class="conta mt-2 ml-2 mb-5" style="overflow:hidden;" >
 <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow:hidden;">
  <li class="nav-item mr-2 ml-2" id="bg">
    <a class="nav-link  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Without Sale</a>
  </li>
  <li class="nav-item ml-2" id="bg">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">On Sale</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($products as $pro)

    @if(!$pro['vendor_on_sale'])
     <div class="item">
      <div class="card store-card shadow">
       <div class="overly">
        <a href="{{url('productpage/'.$pro['id']. '/' .$pro['drop_id'])}}">
          @foreach($pro->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
       <div class="over-text2">
          <p class="sle2 text-danger mt-2" data-id="{{$pro['id']}}">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
           }}%</p>
        </div>
       
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price'] - $pro['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['sell_price']}}</small></del>  </span>
      </p>
      </div>
      <div class="card-footer">
       <div class="text-center rating">
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
         <span class="fa fa-star checked "></span>
        @else
         <span class="fa fa-star"></span> 
        @endif
        @endfor
       </div>
      </div>
    </div>
  </div>
  @endif

  @endforeach
</div>
</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($products as $pro)
    @if($pro['vendor_on_sale'])
     <div class="item">
      <div class="card store-card shadow">
       <div class="overly">
        <a href="{{url('productpage/'.$pro['id']. '/' .$pro['drop_id'])}}">
          @foreach($pro->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
        
      
        <div class="over-text2 ">
          <p class="sle2  text-danger mt-2" data-id="{{$pro['id']}}">{{ceil( ($pro['vendor_discount']/$pro['vendor_new_price'])*100)
           }}%</p>
        </div>
        <div class="over-text5 ">
          <img src="{{asset('pic/On Sale.gif')}}" width="100%">
        </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['vendor_new_price'] - $pro['vendor_discounts']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['vendor_new_price']}}</small></del>  </span>
      </p>
      </div>
      <div class="card-footer">
       <div class="text-center rating">
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
         <span class="fa fa-star checked "></span>
        @else
         <span class="fa fa-star"></span> 
        @endif
        @endfor
       </div>
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
</div>
  </div>
</div>
 </div>


<form id="new-form">
  <input type="hidden" name="newpro" id="newpro">
  <input type="hidden" name="topr" id="topr">
  <input type="hidden" name="drop_search" id="drop_search">
</form>

<script>
 @php
 $en='';
foreach($vendorsale as $sal)
{
  $en = strtotime($sal->sale_end)*1000 ;
}
@endphp

var endtime={{ $en}};

 
  var timer=setInterval(function(){
  var strt=new Date().getTime();
 // alert(strt)
    var t=endtime-strt;
//alert(t)
    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("day").innerHTML= ("0" + da).slice(-2) +
"<span class='d'>d</span>";

document.getElementById("hour").innerHTML= ("0" + hr).slice(-2) +
"<span class='d'>h</span>";

document.getElementById("minute").innerHTML= ("0" + ms).slice(-2) +
"<span class='d'>m</span>";

document.getElementById("second").innerHTML= ("0" + sc).slice(-2) +
"<span class='d'>s</span>";
    }else{

    }
  },1000);
</script>
@endsection