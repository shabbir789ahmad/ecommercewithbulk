@extends('master.master')
@section('content')
<!--this page css is writen in about.css file-->

 <div class="card">
  <div class="card-body">
   <h4 class=" pro mt-3">All Stores</h4>
  </div>
 </div>
 <div class="con mt-3 ">
  <div class="row ml-2 mr-2">
   @foreach($store as $st)
   <div class="col-md-4 col-lg-3 col-12 mt-4">
     <div class="store-image">
      <a href="{{url('store/'.$st['id'])}}">
       <img src="{{asset('uploads/img/' .$st['image'])}}" alt="store Image here" width="100%" height="227rem" class="img-hover">
       <div class="stor-name">
        <p class="">{{$st['store_name']}}</p>
       </div>
       <div class="stor-name2">
       </div></a>

       @foreach($st->coupon as $coun)

       @if($save->isEmpty())
      
          <button class=" stor-btn get-coupon" data-id="{{$coun['id']}}" data-code="{{$coun['code']}}"  data-vendor="{{$coun['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">{{$coun['value']}}</button>
          @else
        @foreach($save as $sv)
          @if($sv['coupon_id']==$coun['id'] &&  $sv['vendor_id']==$coun['vendor_id'])
             <button class=" stor-btn get-coupon bg-dark" >Collected</button>
            @else
             <button class=" stor-btn get-coupon" data-id="{{$coun['id']}}" data-code="{{$coun['code']}}"  data-vendor="{{$coun['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif"> {{$coun['value']}}</button>
            @endif
           @endforeach
         
         @endif
          
         
       @endforeach
     </div>
   </div>
   @endforeach
   <?php unset($value); ?>
  </div>
  {{ $store->links() }}
 </div>


@endsection