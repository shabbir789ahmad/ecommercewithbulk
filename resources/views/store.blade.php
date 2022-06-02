@extends('master.master')
@section('content')

<div id="carouselslider" class="carousel slide " data-ride="carousel">
  <div class="carousel-inner">
    @foreach($banners as $banner)
    <div class="carousel-item  @if($loop->first) active @endif " >
     <div class="slider slider_image" >
      <img class="d-block w-100" loading="lazy" src="{{asset('uploads/img/'.$banner['banner'])}}" alt="Firstlide">
     </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselslider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselslider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="store_detail">
  <h4 id="store_name"></h4>
  <p ><span id="follower"></span><span>Follower</span></p>
  <div class="follow_message">
   <div class="message">
    <i class="fa-solid fa-message fa-3x"></i>
    <span class="text-center">Message</span>
   </div>

   <div class="message message2" @if($follower) id="unfollow" @else id="follow" @endif data-id="" >
    <i class="fa-solid fa-house-user fa-3x "></i>
    <span class="text-center">@if($follower)  Following @else Follow @endif</span>
   </div>

  </div>
</div>

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


<div class="populer_text text-center mt-5">
  <h2 class="browser ">On Sale Product</h2>
  <p class="br2">On Sale Product For You</p>
</div>
 <div class="sale_counter  mb-1">
  <div class="counter">
    <p class="mt-3 ml-5">Sale:</p>  
   <span id="d">0</span>
   <span id="h">0</span>
   <span id="m">0</span>
   <span id="s">0</span>
  </div>
  <button class="btn btn-md see_all">See All</button>

 </div>
<div class="container-fluid pb-5 pt-5 backgorund_color"  >
 <div   class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>




<div class="populer_text text-center mt-5">
  <h2 class="browser ">Hot Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
  <button class="btn btn-md see_all mr-3">See All</button>
</div>
<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>

<div class="populer_text text-center mt-5">
  <h2 class="browser ">Hot Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
  <button class="btn btn-md see_all mr-3">See All</button>
</div>
<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>

<p id="vendor_id" data-id="{{$id}}"></p>


<script>


let endtime= new Date("Jan 5, 2023 15:37:25").getTime();
let strttime= new Date("may 5, 2022 15:37:25").getTime();



  var timer=setInterval(function(){
    var strt=new Date().getTime();
    if(strttime < strt )
    {
   var t=endtime-strt;

    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("d").innerHTML= ("0" + da).slice(-2);

document.getElementById("h").innerHTML= ("0" + hr).slice(-2);

document.getElementById("m").innerHTML= ("0" + ms).slice(-2);

document.getElementById("s").innerHTML= ("0" + sc).slice(-2);
    }else{

    }
  }
  },1000);
</script>

@endsection
@section('script')
<script type="text/javascript">
  $( window ).on('load',function() {
  
    followers($('#vendor_id').data('id'));
});
</script>
@endsection