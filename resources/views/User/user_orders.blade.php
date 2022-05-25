@extends('master.master')
@section('content')

<h4 class="font-weight-bold mt-5 ml-5">Your Orders</h4>
<div class="container-fluid mb-5 d-flex justify-content-center">
  
  <div class="row" style="width:95%;">
    @foreach($orders as $order)
     <div class="col-md-3">
       <div class="card">
        <div class="card-body pb-0">
         <img  src="{{asset('uploads/img/'.$order['image'])}}" class="card-img-top" alt="..."  >
          <h6 class="mt-3">{{$order['product_name']}}</h6>
          <p><span>Color:</span> <span> {{$order['color']}} </span><span class="float-right">Rs. {{$order['sub_total']}}</span> </p>

          <p>
            <a href="{{url('order-track/'.$order['id'])}}" class="btn btn-lg  text-light ">Track order</a>
          </p>
        </div>
       </div>
      </div>
    
@endforeach
  </div>

</div>

@endsection