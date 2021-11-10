@extends('master.master')
@section('content')
<title>Check Out</title>
<div class="fy mb-5 "  style="background-color:#F5F5F5">
<p class=" checkout text-dark pt-3"> Checkout</p>
<div class="contr mt-1 ml-2 mr-2 " >
  <form action="{{url('chechout2')}}" method="POST" enctype="multipart/form-data">
        @csrf
 <div class="row  rounded ">
 	<div class="col-md-8 col-12 col-sm-12 bg-light mb-3 mb-md-0 chechout-shadow" >
    <div class="row">
     <div class="col-md-6 ">
      	 <div class="ml-0 mlsm-0 ml-md-2 mt-3 paymnt">
           <h3>Shipping And Billing </h3>
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
             <option selected hidden disabled >Choose Country
             </option>
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
        
    </div>

 	 <div class="col-md-4 col-12 col-sm-12  mb-3" >
    <div class="">
      <div class="chechout-shadow">
         <p class=" checkout2 ml-3"> Cart<span class="float-right"><i class="fa fa-shopping-cart fa-lg mr-3 text-danger mt-2" ></i></span></p>
      @php $total = 0 @endphp
       @if(session('cart'))
        @foreach(session('cart') as $id => $details)
           @php $total += $details['price'] * $details['quantity'] @endphp
           @php  $sum[]=$details['ship'] @endphp
            @php $sum2 = array_sum($sum) @endphp
      
         
          <p class="ml-3 text-danger"><img src="{{asset('uploads/img/'.$details['image'])}}" width="10%" class="border"><span class="ml-2">{{$details['name']}}</span><span class="float-right mr-3 text-dark">Rs. {{$details['price']}}
          </span></p>
        
         <hr>
             
      
        <input type="hidden" name="product[]" value="{{$details['name']}}">
        <input type="hidden" name="pid[]" value="{{$details['pid']}}">
        <input type="hidden" name="ship[]" value="{{$details['ship']}}">
        <input type="hidden" name="quentity[]" value="{{$details['quantity']}}">
       <input type="hidden" name="price[]" value="{{$details['price']}}">
        <input type="hidden" name="image[]" value="{{ $details['image']}}">
        <input type="hidden" name="drop_id[]" value="{{ $details['drop_id']}}">
        <input type="hidden" name="detail[]" value="{{ $details['detail']}}">
        <input type="hidden" name="color[]" value="{{ $details['color']}}">
        <input type="hidden" name="vendor_id[]" value="{{ $details['vendor_id']}}">
        <input type="hidden" name="size[]" value="{{ $details['size']}}">
         @endforeach
        @endif
        @if(session('coupon'))
        <input type="hidden" name="total" value="{{$sum2 + $total - session('coupon')['value']}}">
        @else
        <input type="text" name="total" value="{{$sum2 + $total}}">
        @endif
       <p class="ml-3 ">Order Summary<span class="float-right mr-3"></span></p>
      <p class="ml-3 "> Subtotal<span class="float-right mr-3">Rs. {{$total}}</span></p>
      <p class="ml-3 text-dark"> Shipping<span class="float-right mr-3">Rs. {{$sum2}}</span></p>
      @if(session('coupon'))
        <p class=" mt-2 ml-3">Coupon:<span class="float-right mr-3"> 
          Rs. {{session('coupon')['value']}} </span></p>
        @endif
      
      @if(session('coupon'))
      <p class=" checkout2 mt-1 py-3 px-2">Total <span class="float-right ">RS. {{$sum2 + $total - session('coupon')['value']}}</span></p>
      @else
      <p class=" checkout2 mt-1 py-3 px-2">Total <span class="float-right ">RS. {{$sum2 + $total }}</span></p>
      @endif
      <button class=" btn btn-check btn-block mb-3  rounded py-3 text-light mb-1">Order Now</button>
       </div> 
 	 </div>
      
  </div>

</form>
</div>

</div>
</div>
@endsection