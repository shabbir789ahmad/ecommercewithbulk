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

<div class="populer_text text-center mt-4">
  <h2 class="browser ">Top Rated Stores</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>

<div class="container-fluid backgorund_color pb-5 pt-5">
 <div class="row">
  @foreach($stores as $store)
  <div class="col-md-3 mt-3">
    <div class="card">
      <div class="card-body pb-1">
        <a href=""><img src="{{asset('uploads/img/'.$store['image'])}}" width="100%" height="200rem"></a>

       <h4 class="browser mt-2 mb-2">{{ucfirst($store['name'])}}</h4>
      </div>
    </div>
  </div>
  @endforeach
 </div>
</div>


<div class="populer_text text-center mt-5">
  <h2 class="browser ">Hot Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>

<div class="container-fluid pb-5 pt-5 backgorund_color" >
 
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

<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
    @endforeach
  
 </div>
</div>
  @endsection 