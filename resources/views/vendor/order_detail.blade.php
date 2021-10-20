@extends('vendor.dashboard')
@section('content')

<div class="container-fluid">

<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('admin/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color"> Order Details</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>
<div class="row mt-2">
  <div class="col-md-3">
    <div class="card">
      <p class="card-header text-light font-weight-bold" style="background-color:#1A8E76"><i class="fas fa-clock"></i> Order Date</p>
      <div class="card-body">
        <p class="text-center font-weight-bold">{{$order['created_at']}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="card card-border">
      <p class="card-header text-light font-weight-bold" style="background-color:#1A8E76"><i class="far fa-credit-card"></i> Payment</p>
     
      <div class="card-body">
        <p class="text-center font-weight-bold">{{ucwords($order['payment'])}}</p>
      </div>
        
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <p class="card-header text-light font-weight-bold" style="background-color:#E67E22"><i class="fas fa-bell"></i>  Order Status</p>
      <div class="card-body">
        <p class="text-center font-weight-bold">{{ucfirst($order['order_status'])}}</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <p class="card-header bg-secondary font-weight-bold text-light"><i class="fas fa-shuttle-van"> </i>  Delivery</p>
      <div class="card-body text-center">
        <img src="{{asset('pic/icons8-dots-loading.gif')}}" class="text-center" width="18%">
      </div>
    </div>
  </div>

</div>


<div class="card-body shadow mt-3" style="background-color:#EEEEEE">
  <div class="row">
    
    <div class="col-md-5  ">
     <div class="conta mt-1  " id="mimage">
      <img  id="mimg" src="{{asset('uploads/img/' .$order['image'])}}" class="rounded shadow" width="90%" height="500rem">
     </div>
    </div>
   
   <div class="col-md-5 mt-2  col-sm-12 ">
    <div class="car ml-4">
    <p class="admin-detail">{{ucwords($order['product'])}}</p>
    @foreach($drop as $d)
     <p>{{ucfirst($d['name'])}}</p>
     @endforeach
     <p class="cash">$ {{$order['total']}} <span class="text-success ml-3">{{ucwords($order['payment'])}}</span></p>
     <p class="detail">{{ucfirst($order['detail'])}}</p>
     
      
       <div class="row mt-5 ">
        <div class="col-md-4 ">
        <p class="cash">Price: </p>
        </div>
        <div class="col-md-8">
         <p>${{$order['total']}}</p>
        </div>
      </div>
      <div class="row  ">
        <div class="col-md-4 ">
        <p class="cash">Size: </p>
        </div>
        <div class="col-md-8">
         <p>{{ucwords($order['size'])}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <p class="cash">Color: 
        </div>
        <div class="col-md-8">
         <p style="background-color:{{$order['color']}}; padding: 2% 4%; width: 30%;"> {{$order['color']}} </p>
        </div>
      </div>
       
         <div class="row">
        <div class="col-md-4">
          <p class="cash">Quantity: 
        </div>
        <div class="col-md-8">
         <p> {{$order['quentity']}} </p>
        </div>
      </div>
         <div class="row">
        <div class="col-md-4">
          <p class="cash">Status: 
        </div>
        <div class="col-md-8">
         <p>{{$order['order_status']}}</p>
        </div>
      </div>

</div>
 </div>
 <div class="col-md-2">
 </div>
</div>

<div class="card mt-4 mb-5 shadow bg-card">
  <p class="admin-detail text-light card-header">User Detail</p>
  <div class="card-body">
      
    <div class="row">
      <div class="col-md-4">
        <p class="cash">Name: <p> 
          <p>{{ucwords($order['name'])}}</p>
          <p class="cash">Phone: </p>
          <p>{{$order['phone']}} </p>
      </div>
      <div class="col-md-4">
         <p class="cash">Country: </p>
         <p>{{$order['country']}} </p>
         <p class="cash">City: </p>
         <p>{{$order['city']}}</p>
      </div>
      <div class="col-md-4">
         <p class="cash">Email: </p>
         <p>{{$order['email']}} </p>
         <p class="cash">Address: </p>
         <p>{{$order['address']}}</p>
      </div>
       </div>
  </div>
</div>

</div>
 
@endsection