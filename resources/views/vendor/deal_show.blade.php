@extends('vendor.dashboard')
@section('content')


<div class="container-fluid " style="background-color:#EAEDED">
 <div class="row ml-2 mr-2">
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    <p class="order-user ml-3 mt-3">Upcomming Sale</p>
    <div class="row ml-1 mr-1">
      @foreach($sell as $sale)
     <div class="col-md-6 col-6 ">
       <img src="{{asset('uploads/img/' .$sale['image'])}}" width="100%" height="80rem" class="">
       <p class="product-detail3 ml-3">{{ucwords($sale['sell_name'])}}</p>
     </div>
      @endforeach
     
    </div>
   </div>
  </div>
 </div>
</div>
@endsection