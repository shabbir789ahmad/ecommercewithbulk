@extends('master.master')
@section("content")
<title>Home</title>
<!-- slider text-->
<div id="carouselslider" class="carousel slide " data-ride="carousel">
  <div class="carousel-inner">
    @foreach($slider as $slide)
    <div class="carousel-item  @if($loop->first) active @endif " >
     <div class="slider">
      <img class="d-block w-100" loading="lazy" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" style="">
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
  <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>

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
    <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>
</div>
 <div class="container-fluid pb-5 pt-5 backgorund_color">
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>

<!-- categores show here  -->
<div class="populer_text text-center mt-5">
  <h2 class="browser ">Categories</h2>
  <p class="br2">Tranding Categories Only for You</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
   <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>
 </div>
<div class="container-fluid pb-5 pt-5 backgorund_color ">
  <div class="row m-1">
    <x-categorycomponent :subcategories="$subcategories" />
  </div>
</div>




<div class="populer_text text-center mt-5">
  <h2 class="browser ">Tranding Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
   <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>
  </div>
<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>

<div class="populer_text text-center mt-5">
  <h2 class="browser ">Liked Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
    <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>
  </div>
<div class="container-fluid pb-5 pt-5 backgorund_color">
<div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>

<div class="populer_text text-center mt-5">
  <h2 class="browser ">Recently Viewed Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>
<div class="sale_counter  mb-1">
  <div class="counter"></div>
  <a href="{{route('all.product')}}" class="btn btn-lg see_all">See All</a>
</div>
<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>




<script>
 @php
 //dd($sells);
 $en='';
 $strt='';
foreach($sells as $sal)
{
  $en = strtotime($sal->end_time)*1000 ;
  $strt= strtotime($sal->start_time)*1000 ;
}
@endphp

// let endtime={{ $en}};
let endtime= new Date("Jan 5, 2023 15:37:25").getTime();
let strttime= new Date("may 5, 2022 15:37:25").getTime();
// let strttime={{ $strt}};


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