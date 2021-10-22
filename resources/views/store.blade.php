@extends('master.master')
@section('content')

 @foreach($banner as $bann)
<div class="store-banner">
 <img src="{{asset('uploads/img/' .$bann['banner'])}}"  >

 <div class="txt">
 	<p class="dis">60% Discount</p>
<h4 class="">{{ucfirst($bann['heading1'])}}</h4>
<p class="best">{{ucfirst($bann['heading2'])}}</p>
 <button class="btn btn-xl btn-store text-light rounded"> Shop Now</button>
 </div>
</div>
@endforeach
<h4 class=" pro mt-5">Our Products</h4>

<div class="container-fluid mt-0 mt-sm-0 mt-md-5" >
 <ul class="nav nav-pills  bg-store p-3" id="pills-tab" role="tablist">
  <li class="nav-item n1">
    <a class="nav-link n2 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New Product</a>
  </li>
  <li class="nav-item n1">
    <a class="nav-link n2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Top Rated</a>
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
	
	 <div class="col-md-3 col-sm-6 col-lg-3 ml-2">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
       <p class=" ml-2 text-danger mt-3">{{ucfirst($st['product'])}} <span class="float-right mr-2 text-dark">
     
        @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
       
       </span></p>
       <div class="d-flex">
        <p class="text2">{{ucfirst($st['detail'])}} </p>
       	@foreach($st->stock as $stock)
        <p class="ml-auto mr-2 text2">${{$stock['sell_price']-$stock['discount']}} 
          <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
       </div>
      </div>
      
      </div>
	 </div>

	 @endforeach
	</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<!-- New Product-->
  	<div class="row mt-3">
		@foreach($storenew as $st)
      @if($st['rating']>3)
	 <div class="col-md-4 col-sm-6 col-lg-4">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
        
       <p class="stor-text text-danger">{{ucfirst($st['product'])}}</p>
       <div class="d-flex">
        <p class="text2">{{ucfirst($st['detail'])}} </p>
        @foreach($st->stock as $stock)
       	<p class="ml-auto mr-2 text2">${{$stock['sell_price']-$stock['discount']}} <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
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
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  	<!-- all product-->
  <div class="row mt-3">
		@foreach($store as $st)
	 <div class="col-md-4 col-sm-6 col-lg-4">
     <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	   <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
          @endforeach
        </a>
      <div class="card-body p-0">
         <p class="stor-text text-danger">{{ucfirst($st['product'])}}</p>
         <div class="d-flex">
          <p class="text2">{{ucfirst($st['detail'])}} </p>
       	  @foreach($st->stock as $stock)
        <p class="ml-auto mr-2 text2">
          
          ${{$stock['sell_price']-$stock['discount']}} 
          <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
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