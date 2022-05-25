@extends('master.master')
@section('content')


<?php $shipping=''; ?>
    <?php $sub_total=''; ?>
 
   @forelse(session('cart') as $id => $item)
     @php  $shipping=$item['shipping_cost'] @endphp
     @php  $sub_total=$item['sub_total']; @endphp
      
      @empty
   @endforelse


   @error('address')  
   <div class="alert alert-danger mt-4 ml-4" role="alert">
    Please Provide your shipping Address
</div>
@enderror

<div class="container-fluid  mb-5  d-flex justify-content-center bg-light" >

  
  <div class="row mt-2" style="width:95%">

   <div class="col-md-7 col-12  ">
    <div class=" py-2 text-light" style="background-color: #09192C;">
      <h4 class=" ml-3 mt-1">Billing Details</h4>
      
    </div>

    <div class="row mt-2 justify-content-center d-flex">
    <div class="col-md-2 col-6 ml-2 p-0">
      <div class="card cash_on_delivery" data-id='{{1}}'>
       <div class="card-body text-center p-0">
        <img src="{{asset('pic/TB1LkpwLAY2gK0jSZFgXXc5OFXa-400-400.png')}}" width="60%" >
        <p>Easypaisa</p>
      </div>
     </div>
    </div> 

    <div class="col-md-2 col-6 ml-2 p-0">
      <div class="card cash_on_delivery" data-id='{{2}}'>
       <div class="card-body text-center p-0">
        <img src="{{asset('pic/TB1E16ye5_1gK0jSZFqXXcpaXXa-160-160.png')}}" width="60%" >
        <p>JazzCash</p>
      </div>
     </div>
    </div>

    <div class="col-md-2 col-6 ml-2 p-0">
      <div class="card cash_on_delivery" data-id='{{3}}'>
       <div class="card-body text-center p-0">
        <img src="{{asset('pic/TB1qIthr67nBKNjSZLeXXbxCFXa-80-80.png')}}" width="60%" >
        <p>Debt Card</p>
      </div>
     </div>
    </div>
    
    <div class="col-md-2 col-6 ml-2 p-0">
      <div class="card cash_on_delivery" data-id='{{4}}'>
       <div class="card-body text-center p-0">
        <img src="{{asset('pic/TB1oXEdqRjTBKNjSZFNXXasFXXa-80-80.png')}}" width="60%" >
        <p>Hbl Account </p>
      </div>
     </div>
    </div>
    
    <div class="col-md-2 col-6 ml-2 p-0">
      <div class="card cash_on_delivery" data-id='{{5}}'>
       <div class="card-body text-center p-0">
        <img src="{{asset('pic/TB1utb_r8jTBKNjSZFwXXcG4XXa-80-80.png')}}" width="60%" >
        <p>Cash On Delivery</p>
      </div>
     </div>
    </div>
  </div>
    
    <div class="card" >
      <div class="card-body">
       <form action="{{route('user.order')}}" method="POST">
       @csrf 
       @if($address)
       <input type="hidden" name="address" value="{{$address['address']}}">
       <input type="hidden" name="state" value="{{$address['state']}}">
       <input type="hidden" name="city" value="{{$address['city']}}">
       <input type="hidden" name="payment_status" id="payment_status">
       @endif
       <input type="hidden" name="final_total" value="{{$shipping + $sub_total}}">
        <div id="order_payment_option"></div>
        
       </form>
      </div>
    </div>
  </div> 
  


    <div class="col-md-4 pr-0">
      <div class="card">
        <h4 class="card-header text-light"  style="background-color: #09192C;">Shipping And Billing</h4>
        <div class="card-body">
          
          <p class="mb-0"><i class="fa-solid fa-location-dot text-info"></i>  {{ucfirst(Auth::user()->name)}}  <span class="float-right text-info get_states" data-toggle="modal" data-target="#exampleModal">Edit</span></span></p>
          @if($address)
          <p class="discount">{{$address['state']}},{{$address['city']}},{{$address['address']}}</p>
          @endif
          <p class="discount"><i class="fa-solid fa-address-book text-info"></i> Bill To The Same Address  <span class="float-right text-info">Edit</span></span></p>

          <p class="discount"><i class="fa-solid fa-phone text-info"></i><span id="phone_number">{{Auth::user()->phone}}</span> <span class="float-right text-info show_input_number">Edit</span></span></p>
           
           <div class="update_phone_number" style="display:none;">
           <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="user_phone">
           <button class="btn btn-md phone_update" data-id="{{Auth::id()}}">Save</button>
           </div>

          <p class="discount"><i class="fa-solid fa-envelope text-info"></i><span id="email"> {{Auth::user()->email}}</span> <span class="float-right text-info show_user_email">Edit</span></span></p>
          
          <div class="update_email" style="display:none;">
           <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" id="user_email">
           <button class="btn btn-md email_user_update" data-id="{{Auth::id()}}">Save</button>
           </div>
          
           <p>Order Summary </p>

           <p class="discount">SubTotal <span class="float-right ">Rs.<span class="ship font-weight-bold text-dark">{{$sub_total}}</span></span></p>
           <p class="discount">Shipping Fee <span class="float-right ">Rs.<span class="ship text-dark font-weight-bold">{{$shipping}}</span></span></p>
           

           <p class="mb-0 mt-3 d-flex">Coupon Code</p>
           <div class="d-flex">
           <input type="text" name="coupon" class="form-control">
           <button class="btn btn-md ">APPLY</button>
           </div> 
           <hr>
           <p>Final Total <span class="float-right"  style="font-size:2vw;color: #E86209;">Rs. {{$shipping + $sub_total}}</span></p>
           
        </div>
      </div>
    </div>
  </div>
</div>


<x-addresscomponent />



@endsection
@section('script')
<script type="text/javascript">
  
   $(".cash_on_delivery").click(function (e) {
        e.preventDefault();
        let id=$(this).data('id');
      $('#order_payment_option').empty();
       if(id===5)
       {
        $('#payment_status').val('5')
         $('#order_payment_option').append(`

         <p class=" mt-5">You can pay in cash to our courier when you receive the goods at your doorstep.</p>
        <button class="btn btn-lg align-middle mt-3" style="border-radius:0">Order Now</button>
        `);

       }else
       {

        $('#order_payment_option').append(`

         <p class=" mt-5">Orther Coming Soon.</p>
        
        `);

       }
       
    });

  
 

</script>
@endsection