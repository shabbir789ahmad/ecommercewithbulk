@extends('master.master')
@section('content')
<style type="text/css">
  .deal-card{
    width: 100%; height:20.5rem; 
    transition: .5s ease;
  }
  .deal-card:hover{
     transform: scale(1.1);
 
  }
</style>
<div class="container-fluid">
  <img src="{{asset('pic/Shop Now.gif')}}" width="100%" height="400rem">
</div>



<div class="container-fluid mt-4 mb-5" >
 <div class="row ml-2 mr-2">
  @foreach($deal as $d)
  <div class="col-md-3 col-12">
   <div class="card shadow deal-card mt-2" >
    <div class="row mt-2">
     <div class="col-md-12 col-12">
       <a href="{{'productpage/'.$d['id']. '/'.$d['drop_id']}}">
       <img src="{{asset('uploads/img/' .$d['deal_image'])}}" width="95%" height="215rem" class="ml-2 rounded"></a> 
        <h1 class="product-detail3 ml-3 mb-0 mt-3" style="font-size: 1.2rem">Rs. {{$d->sell_price - $d->discount}}
          <span class="text-danger"><small><del>{{$d->sell_price}}</del></small></span></h1>
      
       <p class=" ml-3  mb-0 product-detail "  >{{ucwords($d['deal_name'])}}</p>

     </div>
    </div>
    <div class="button d-flex justify-content-center">
     
   </div>
   </div>
  </div>
  @endforeach
 </div>
</div>



@endsection