@extends('master.master')
@section('content')
<h3 class="page-title text-center"></h3>

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($search2)
<div class="row mr-2">
  @foreach($search2 as $pro)

  <div class="col-md-3 col-sm-4 col-12 mt-2">
    <div class="item">
     <div class="product-image">
      <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">
        @foreach($pro->image as $img)
         <img  src="{{asset('uploads/img/' .$img['rimage'])}}" class="card-img-top" alt="...">
        @endforeach
      </a>

      <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>
       @if($pro['discount'])
        <a > <p class="overlay2 text-danger">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
       <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered-removebg-preview.png')}}" width="100%" height="10rem">
        </p>
     </div>
     <div class="product-text d-flex mt-2">
      <p class="product-name2 ml-2">{{ucwords($pro['product'])}}</p>
      <p class="ml-auto product-name2 mr-2">Rs. {{$pro['sell_price']-$pro['discount']}}</p>
     </div>
     <div class="text-center">
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
       </div>
    </div>   
  </div>
      @endforeach
</div>
@else
<p class="ml-5 mt-5 font-weight-bold">Not Product Found</p>
@endif
@endsection