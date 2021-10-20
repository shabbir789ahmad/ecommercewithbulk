@extends('master.master')
@section('content')

<div class="store-banner">
 <img src="{{asset('pic/woman-holding-various-shopping-bags-copy-space.jpg')}}" width="100%" height="500rem" >

 <div class="txt">
 	<p class="dis">60% Discount</p>
<h4 class="">Winter <br>collection</h4>
<p>Best Cloth Collection By 2020!</p>
 <button class="btn btn-xl btn-store text-light rounded"> Shop Now</button>
 </div>
 
</div>

<h4 class=" pro mt-5">Our Products</h4>

<div class="container mt-0 mt-sm-0 mt-md-5" >
 <ul class="nav nav-pills  bg-store p-3" id="pills-tab" role="tablist">
  <li class="nav-item n1">
    <a class="nav-link n2 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Top Rated</a>
  </li>
  <li class="nav-item n1">
    <a class="nav-link n2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">New Product</a>
  </li>
  <li class="nav-item n1">
    <a class="nav-link n2" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">All Product</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  	 <!-- top rated-->
     <div class="row mt-3">
		@foreach($store as $st)
		@if($st['rating']>3)
	 <div class="col-md-4 col-sm-6 col-lg-4 ">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
       <p class="stor-text">{{$st['product']}}</p>
       <div class="d-flex">
        <p class="text2">{{$st['detail']}} </p>
       	<p class="ml-auto mr-2 text2">${{$st['sell_price']-$st['discount']}} <del class="text-danger">${{$st['sell_price']}}</del></p>
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
        
        @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
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
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<!-- New Product-->
  	<div class="row">
		@foreach($store as $st)
	 <div class="col-md-4 col-sm-6 col-lg-4">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
       <p class="stor-text">{{$st['product']}}</p>
       <div class="d-flex">
        <p class="text2">{{$st['detail']}} </p>
       	<p class="ml-auto mr-2 text2">${{$st['sell_price']-$st['discount']}} <del class="text-danger">${{$st['sell_price']}}</del></p>
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
           @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
          </div>
       </div>
      </div>
	 </div>
	 @endforeach
	</div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  	<!-- all product-->
  	<div class="row">
		@foreach($store as $st)
	 <div class="col-md-4 col-sm-6 col-lg-4">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
       <p class="stor-text">{{$st['product']}}</p>
       <div class="d-flex">
        <p class="text2">{{$st['detail']}} </p>
       	<p class="ml-auto mr-2 text2">${{$st['sell_price']-$st['discount']}} <del class="text-danger">${{$st['sell_price']}}</del></p>
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
           @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
          </div>
       </div>
      </div>
	 </div>
	 @endforeach
	</div>
  </div>
</div>
	
 
  
</div>
@endsection