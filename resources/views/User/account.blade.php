@extends('master.master')
@section('content')


<div class="container">
   <p class="product-name mt-5">Your Acount</p>
   <div class="row">
    <div class="col-md-4 col-12">
    <a href="{{url('user_dashborad')}}"style="text-decoration:none;"> <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/order._CB660668735_.png')}}" width="25%">
          <div class="text-user ml-3">
           <h6 class="order-user">Your order</h6>
           <p class="product-detail3">track,return or buy Again</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12">
    <a href="{{url('/login-and-securty')}}"style="text-decoration:none;">	<div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/security._CB659600413_.png')}}" width="25%">
          <div class="text-user ml-3 ">
           <h6 class="order-user">Login & Security</h6>
           <p class="product-detail3 ">Edit Name,Mobile,Password</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12">
   <a href="{{url('user_profile')}}"style="text-decoration:none;">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/account._CB660668669_.png')}}" width="25%">
          <div class="text-user ml-3">
           <h6 class="order-user">Your Profile</h6>
           <p class="product-detail3">Manage Add or remove Profile</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
    <a href="{{url('user_message')}}"style="text-decoration:none;">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/9_messages._CB654640573_.jpg')}}" width="25%">
          <div class="text-user ml-3">
           <h6 class="order-user">Your Message</h6>
           <p class="product-detail3">View All Messages</p>
          </div>
        </div>
      </div>
     </div>
    </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
   <a href="{{url('get-wishlist')}}"style="text-decoration:none;">
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/10_archived_orders._CB654640573_.png')}}" width="25%">
          <div class="text-user ml-3">
           <h6 class="order-user">Your Wishlist</h6>
           <p class="product-detail3">View,Manage Your Wishlist</p>
          </div>
        </div>
      </div>
     </div>
     </a>
    </div>
    <div class="col-md-4 col-12 mt-4">
   <a href="{{url('cart')}}"style="text-decoration:none;"> 
     <div class="card shadow user-card-hover">
      <div class="card-body">
        <div class="d-flex">
          <img src="{{asset('pic/order._CB660668735_.png')}}" width="25%">
          <div class="text-user ml-3">
           <h6 class="order-user">Your Cart</h6>
           <p class="product-detail3">track,return or buy Again</p>
          </div>
        </div>
      </div>
     </div>
    </a>
    </div>
   </div>
</div>

@endsection