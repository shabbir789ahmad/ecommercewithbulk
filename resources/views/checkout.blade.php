@extends('master.master')
@section('content')
<title>Check Out</title>
<div class="fy mb-5 "  style="background-color:#F5F5F5">
<p class=" checkout text-dark pt-3"> Checkout</p>
<div class="container mt-1 " >
    <form action="{{url('chechout2')}}" method="POST" enctype="multipart/form-data">
        @csrf
 <div class="row  rounded chechout-shadow">
 	<div class="col-md-8 col-12 col-sm-12 bg-light mb-3" >
         <div class="row">
    <div class="col-md-6 ">
      	 <div class="ml-0 mlsm-0 ml-md-2 mt-3 paymnt">
                 <h3>User Detail </h3>
      		<label><i class="fas fa-user mt-4"></i>Full Name</label>
          <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required>
          <span class="text-danger">@error ('name') {{$message}} @enderror</span>
          <label class="mt-2"><i class="fas fa-envelope"></i> Email</label>
          <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" required>
          <span class="text-danger">@error ('email') {{$message}} @enderror</span>

          <label class="mt-4"><i class="fas fa-building"></i> Phone</label>
          <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" required>
          <span class="text-danger">@error ('phone') {{$message}} @enderror</span>

          <label class="mt-2"><i class="fas fa-map-marker-alt"></i> Address</label>
          <input type="text" name="address" class="form-control" required>
          <span class="text-danger">@error ('address') {{$message}} @enderror</span>
       
         </div>
       </div>
       <div class="col-md-6">
        <div class="paymnt mt-0 mt-sm-0 mt-md-5 ml-0 ml-sm-0 ml-md-5">
         
        <label class="mt-4"><i class="fas fa-globe"></i> Country</label>
         <select class="form-control" class="country" name="country" required>
            <option selected hidden disabled >Choose Country</option>
             <option>Pakistan</option>
             <option>Qatar</option>
             <option>UAE</option>
             <option>KSA</option>
         </select>
         <span class="text-danger">@error ('country') {{$message}} @enderror</span>
         <label class="mt-3"><i class="fas fa-building"></i> City</label>
          <select class="form-control" name="city" required>
            <option selected hidden disabled >Choose City</option>
             <option>Lahore</option>
             <option>Karachi</option>
             <option>Dubai</option>
             <option>Multan</option>
         </select>
          <span class="text-danger">@error ('city') {{$message}} @enderror</span>
         <label class="mt-3"><i class="fas fa-file-archive"></i> Post Code</label>
          <input type="text" name="post_code" class="form-control" required>
            <span class="text-danger">@error ('post_code') {{$message}} @enderror</span>

          <input type="checkbox" name="payment" value="cash on delivery"  class="mt-3 mt-sm-3 mt-md-5 mb-5 mb-sm-5 mb-sm-0" required>

          <span>Payment On Delivery</span>
           <span class="text-danger">@error ('payment') {{$message}} @enderror</span>
       </div>
   </div>
      	</div>
        <button class=" btn btn-check   rounded py-3 text-light mb-1">Order Now</button>
      </div>
 	 <div class="col-md-4 col-12 col-sm-12 summary-bg mb-3">
       
       <div class=" mt-3   ">
        <h3 class="mt-4 text-light">Orders </h3>
       
         
                  
        <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
       @php //dd(session('cart')) @endphp
       @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
             $details['vendor_id']
                @php $total += $details['price'] * $details['quantity'] @endphp
                @php  $sum[]=$details['ship'] @endphp
               @php $sum2 = array_sum($sum) @endphp
      <div class="carousel-item @if($loop->first) active @endif">
        <div class="cart-img">
        <img class="d-block w-100 rounded" height="320rem" src="{{asset('uploads/img/' .$details['image'])}}" alt="First slide">
        <p class="overlayi ">{{ucwords($details['name'])}}</p>
        
    </div>
      </div>
      
        <input type="hidden" name="product[]" value="{{$details['name']}}">
                   <input type="hidden" name="quentity[]" value="{{$details['quantity']}}">
                   <input type="hidden" name="price[]" value="{{$details['price']}}">
                   <input type="hidden" name="image[]" value="{{ $details['image']}}">
                   <input type="hidden" name="drop_id[]" value="{{ $details['drop_id']}}">
                   <input type="hidden" name="detail[]" value="{{ $details['detail']}}">
                   <input type="hidden" name="color[]" value="{{ $details['color']}}">
                   <input type="text" name="vendor_id[]" value="{{ $details['vendor_id']}}">
                   <input type="hidden" name="size[]" value="{{ $details['size']}}">
         @endforeach
        @endif
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
                
                 
        <input type="hidden" name="total" value="{{$sum2 + $total}}">
       </div>
      
        <h3 class="  mt-5 py-3 px-2">Total <span class="float-right text-light">$: {{$sum2 + $total}}</span></h3>
       
 	 </div>
      
  </div>

</form>
</div>

</div>
</div>
@endsection