@extends('master.master')
@section('content')
<div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card card-track">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5 class="">ORDER ID<span class="text-dark font-weight-bold">: {{$order['id']}}</span></h5>
            </div>
            
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class=" @if($order['order_status']=='Pending' || $order['order_status']=='Shipped' || $order['order_status']=='Enroute' || $order['order_status']=='Delivered') active  step0 @endif "></li>
                    <li class="
                     @if($order['order_status']=='Shipped' || $order['order_status']=='Enroute' || $order['order_status']=='Delivered') active  step0 @endif
                     step0"></li>
                    <li class=" 
                     @if($order['order_status']=='Enroute' || $order['order_status']=='Delivered') active  step0 @endif
                    "></li>
                    <li class="
                     @if($order['order_status']=='Delivered' ) active  step0 @endif
                    "></li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content">
            	<i class="fas fa-receipt fa-3x"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
            	<i class="fas fa-dolly fa-3x"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Shipped</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
            	<i class="fas fa-shipping-fast fa-3x"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <i class="fas fa-home fa-3x"></i>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection