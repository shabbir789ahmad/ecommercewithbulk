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
<p class="text-left text-md-center mt-3   ">${{ $details['price'] }}</p>
</div>
<div class="col-md-2 col-sm-6 col-6 tr" data-th="" data-id="{{ $id }}">
  <td data-th="Quantity">
   <input type="number" value="{{ $details['quantity'] }}" class="form-control quan update-cart mt-3" />
                    </td>
</div>
<div class="col-md-2 col-sm-6 col-6 ">
<p class="text-left text-md-center mt-3  ">${{ (int)$details['price'] * $details['quantity'] }}</p>
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
       <p class=" mt-2 ">SubTotal:<span class="float-right"> ${{ $total }}</span></p>
       @foreach(session('cart') as $id => $details)
               @php  $sum[]=$details['ship'] @endphp
               @php $sum2 = array_sum($sum) @endphp
       <p class=" mt-2 ">Shipping:<span class="float-right"> 
        ${{ $sum2 }} </span></p>
     <hr>
         <p class=" mt-2 ">Total:<span class="float-right">
        {{ $sum2 + $total }} 
          </span></p>
          @endforeach
        <a href="{{url('checkout')}}"><button class="btn rounded py-3 btn-style mt-3">Checkout</button></a>

    </div>
    </div>
  </div>

</div>
    
      
      


@endsection