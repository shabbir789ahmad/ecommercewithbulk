@extends('master.master')
@section('content')
<a href="{{ url('/') }} "  class="btn mt-5 btn-check text-light oproduct-name rounded d-block d-md-none"><i class="fa fa-angle-left"></i> Continue Shopping</a>
<div class="container mt-5 shadow border">

<div class="row d-none d-sm-none d-md-flex">

<div class="col-md-2 col-sm-5 col-5 ">
<p class="ml-3  mt-3">Product</p>
</div>
<div class="col-md-3 col-sm-2 col-2">
<p class=" mt-3  ">Name</p>
</div>
<div class="col-md-1 col-sm-2 col-2">
<p class="text-center mt-3  ">price</p>
</div>
<div class="col-md-2 col-sm-2 col-2">
<p class="text-center mt-3  ">Quantity</p>
</div>
<div class="col-md-2 ">
<p class="text-center mt-3 ">Subtotal</p>
</div>
<div class="col-md-2 col-sm-2 col-2">
<p class="text-center mt-3 ">Operation</p>
</div>
</div>
<hr class="d-none d-md-block">
@php $total = 0
    
 @endphp
 
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total +=(int) $details['price'] * $details['quantity'] @endphp
               @php  $sum[]=$details['ship'] @endphp
               @php $sum2 = array_sum($sum) @endphp
<div class="row  border-top pt-4 mb-3 ">
  <div class="col-md-2 col-sm-12 col-12 d-flex ">
   <img src="{{asset('uploads/img/'.$details['image'])  }}" width="100%" height="100%" class="img-responsive cart-image"/>
  </div>
 <div class="col-sm-6 col-6 col-md-3">
<h4 class=" mt-4 ml-0 ml-md-4 oproduct-name">{{ucwords($details['name'] )}}</h4>

</div>
<div class="col-md-1 d-sm-none d-none d-md-block">
<p class="text-left text-md-center mt-3   ">Rs. {{ $details['price'] }}</p>
</div>
<div class="col-md-2 col-sm-6 col-6 tr" data-th="" data-id="{{ $id }}">
  <td data-th="Quantity">
   <input type="number" value="{{ $details['quantity'] }}" class="form-control quan update-cart mt-3" />
                    </td>
</div>
<div class="col-md-2 col-sm-6 col-6 ">
<p class="text-left text-md-center mt-3  ">Rs. {{ (int)$details['price'] * $details['quantity'] }}</p>
</div>

<div class="col-md-2 col-sm-2 col-2 text-center actions " data-th="" data-id="{{ $id }}">

<button class="btn btn-danger btn-sm mt-3 remove-from-cart">
     <i class="fas fa-trash-alt"> </i>
       </button>

</div>
</div>

    @endforeach
    @else
    <p class="text-danger text-center">
     <i class="fa  fa-cart-plus text-danger  fa-5x"></i><br>
    Cart is Empty</p>
        @endif

    </div>


<div class="container">
  <div class="row">
    <div class="col-md-4">
     <a href="{{ url('/') }} "  class="btn mt-5 btn-check text-light oproduct-name rounded d-none d-md-block"><i class="fa fa-angle-left"></i> Continue Shopping</a>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4 ">
        <div class="mt-5 g border p-5">
       <p class=" mt-2 ">SubTotal:<span class="float-right"> Rs. {{ $total }}</span></p>
       @if(session('cart'))
       @foreach(session('cart') as $id => $details)
               @php  $sum[]=$details['ship'] @endphp
               @php $sum2 = array_sum($sum) @endphp
       <p class=" mt-2 ">Shipping:<span class="float-right"> 
        Rs. {{ $sum2 }} </span></p>
        @if(session('coupon'))
          <p class=" mt-2 ">Coupon:<span class="float-right"> 
          Rs. {{session('coupon')['value']}} </span></p>
        @endif
     <hr>
     @if(!session()->get('coupon'))
     <form action="{{url('check-coupon')}}" method="POST">
      @csrf
       <div class="input-group form-header ">
       <input type="text" name="coupon" class="form-control " placeholder="Enter Coupon Code" id="cpn"  aria-describedby="basic-addon2" autocomplete="off">
        <div class="input-group-append">
         <button class="btn btn-primary text-light rounded" type="submit">Apply</button>
        </div>
      </div>
     </form>
     @endif
     @if ($alert = Session::get('error'))
    <div class="alert alert-danger py-2">
        {{ $alert }}
    </div>
     @endif
     @if(session('coupon'))
         <p class=" mt-2 ">Total:<span class="float-right">
        Rs. {{ $sum2 + $total - session('coupon')['value']}} 
          </span></p>
          @endif
          @endforeach
          @endif
          @if(Auth::user())
        <a href="{{url('checkout')}}"><button class="btn rounded py-3 btn-style mt-3">Checkout</button></a>
        @else
        <button class="btn rounded py-3 btn-style mt-3" id="checkout">Checkout</button>
        @endif

    </div>
    </div>
  </div>

</div>
    
      
      
<!--put product on Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title text-center" id="exampleModalLabel">Please Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex ">
         <button type="button" id="loginform" class="btn btn-color py-3 text-light btn-block py-2">Login</button>
        <button type="button" id="signinform" class="btn btn-color text-light btn-block py-2">Signup</button>
        </div>
        <div class="login_form" >
        <form method="POST" action="{{url('login')}}">
          @csrf
           
         <input id="email" type="email" class="form-control mt-3 py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
          @error('email')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
           </span>
          @enderror
        
         <input id="password" type="password" class="form-control py-3 mt-4 mb-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
         @error('password')
          <span class="invalid-feedback mb-5" role="alert">
           <strong>{{ $message }}</strong>
          </span>
         @enderror
       <button class="btn btn-color float-right btn-block py-3 mt-5 text-light rounded">Save</button>
     </form> 
   </div>

   <div class="signin_form" style="display: none;">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          @csrf
         <input id="email" type="email" class="form-control mt-3 py-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
           <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
         
         <input id="phone" type="number" class="form-control mt-3 py-3 @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') }}" required autocomplete="phone">
  @error('phone')
   <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
                </span>
           @enderror

            <input id="password" type="password" placeholder="Password" class="form-control mt-3 py-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

           @error('password')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
          <input id="password-confirm" type="password" placeholder="Conform Password" class="form-control mt-3 py-3" name="password_confirmation" required autocomplete="new-password">
     
     <input id="image" type="file" placeholder="Choose Image" class="form-control mt-3 mb-5" name="image" required autocomplete="profile"> 
        
       <button class="btn btn-color float-right btn-block py-3 mt-4 text-light rounded">Save</button>
     </form> 
   </div>
     </div>
      
       
    </div>
  </div>
</div>

@endsection