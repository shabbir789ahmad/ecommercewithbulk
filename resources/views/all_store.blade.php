@extends('master.master')
@section('content')
<!--this page css is writen in about.css file-->

 <div class="card">
  <div class="card-body">
   <h4 class=" pro mt-3">All Store</h4>
  </div>
 </div>
 <div class="con mt-3 ">
  <div class="row ml-2 mr-2">
    @foreach($store as $st)
   <div class="col-md-3 col-12 mt-4">
     <div class="store-image">
       <img src="{{asset('uploads/img/' .$st['image'])}}" alt="store Image here" width="100%" height="227rem" class="img-hover">
       <div class="stor-name">
        <p class="">{{$st['store_name']}}</p>
       </div>
       <div class="stor-name2">
       </div>
       @foreach($st->coupon as $coun)
       @foreach($st->save as $sv)
       
       @if($sv['coupon_id']==$coun['id'] && $sv['user_id']==$usid)
        <button class=" stor-btn get-coupon" >coupon</button>
       @else
       <button class=" stor-btn get-coupon" data-id="{{$coun['id']}}" data-code="{{$coun['code']}}" data-vendor="{{$coun['vendor_id']}}">{{$coun['value']}}</button>
       @endif
       
       @endforeach
       @endforeach
     </div>
   </div>
   @endforeach
   <div class="col-md-3 mt-4">
     <div class="store-image">
       <img src="{{asset('pic/sub_banner4-compressor_400x_crop_center.png')}}" width="100%" class="img-hover">
       <div class="stor-name">
        <p class="">Namef</p>
       </div>
       <div class="stor-name2">
       </div>
       <button class=" stor-btn">coupon</button>
     </div>
   </div>
   <div class="col-md-3 mt-4">
     <div class="store-image">
       <img src="{{asset('pic/sub_banner4-compressor_400x_crop_center.png')}}" width="100%" class="img-hover">
       <div class="stor-name">
        <p class="">Namef</p>
       </div>
       <div class="stor-name2">
       </div>
       <button class=" stor-btn">coupon</button>
     </div>
   </div>
   <div class="col-md-3 mt-4">
     <div class="store-image">
       <img src="{{asset('pic/sub_banner2-compressor_400x_crop_center.png')}}" width="100%" class="img-hover">
       <div class="stor-name">
        <p class="">Namef</p>
       </div>
       <div class="stor-name2">
       </div>
       <button class=" stor-btn">coupon</button>
     </div>
   </div>
   
  </div>
  {{ $store->links() }}
 </div>


@endsection