<div class="container mt-0 mt-sm-0 mt-md-5" >
 <ul class="nav nav-pills  bg-store p-3" id="pills-tab" role="tablist">
  <li class="nav-item n1">
    <a class="nav-link n2 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Without Sale</a>
  </li>
  <li class="nav-item n1">
    <a class="nav-link n2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">On Sale</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <!-- top rated-->
     <div class="swiper mySwiper">
  <div class="swiper-wrapper">
   @foreach($product as $st)
   @foreach($st->stock as $stock)
   @if(!$stock['on_sale'])
   <div class="swiper-slide">
   
   </div>
   @endif
   @endforeach
   @endforeach
  </div>
    <div class="swiper-pagination"></div>
 </div>
        
    </div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- New Product-->
  <div class="row mt-3">
    @foreach($product as $st)
      @foreach($st->stock as $stock)
      @if($stock['on_sale'])
     <div class="col-md-4 col-sm-6 col-lg-4 ">
      <div class="card store-card shadow">
       
       <div class="card-body p-0">
       <p class="stor-text text-danger">{{ucfirst($st['product'])}}</p>
       <div class="d-flex">
        <p class="text2">{{ucfirst($st['detail'])}} </p>
        @foreach($st->stock as $stock)
        <p class="ml-auto mr-2 text2">${{$stock['sell_price']-$stock['discount']}} 
          <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
        
        @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
       
          </div>
       </div>
      </div>
   </div>
     @endif
   @endforeach
   @endforeach
  </div>
  </div>

</div>














<!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel2 owl-theme ml-2">
    @foreach($product as $pro)
    @foreach($pro->stock as $stock)
    @if($stock['on_sale'])
     <div class="item">
      <div class="card store-card shadow">
       <div class="overly">
        <a href="{{url('vendor/stock-detail/' .$pro['id'])}}">
          @foreach($pro->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
        @foreach($pro->stock as $stock)
        @foreach($sale as $sl)
        @if($sl['end_time']>= $date)
         <div class="over-text">
          <p class="sle mt-2" data-id="{{$stock['id']}}">Apply Sale </p>
         </div>
        @endif
        @endforeach
        <div class="over-text2">
          <p class="sle2 text-danger mt-2" data-id="{{$stock['id']}}">{{ceil( ($stock['discount']/$stock['sell_price'])*100)
           }}%</p>
        </div>
        @endforeach
       </div>
      <div class="card-body p-0">
       <p class="stor-text text-danger">{{ucfirst($pro['product'])}}</p>
       <div class="d-flex">
        <p class="ml-auto mr-2 text2">${{$pro['sell_price']-$pro['discount']}} 
        <del class="text-danger">@if($pro['discount']) ${{$pro['sell_price']}} @else @endif</del></p>
       </div>
      </div>
      <div class="card-footer">
       <div class="text-center rating">
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
  </div>
  @endif
  @endforeach
  @endforeach
</div>
</div>


@if($coup->save)
        @if($coup->save->coupon_id==$coup['id'] && $coup->save->user_id==$usid)
        <button class=" stor-btn get-coupon bg-dark" >Collected</button>
        @else
        <button class=" stor-btn get-coupon" data-id="{{$coup['id']}}" data-code="{{$coup['code']}}"  data-vendor="{{$coup['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">{{$coup['value']}}</button>
        @endif
        @else
          <button class=" stor-btn get-coupon" data-id="{{$coup['id']}}" data-code="{{$coup['code']}}"  data-vendor="{{$coup['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">{{$coup['value']}}</button>
        @endif








        try {
                Order::create($orderData)->save();
                $product->user->notify(new OrderNotification($order_file));
                return redirect()->route('home')->with('status', 'your orders has been sent successfully');
            }catch (\Exception $e) {
                return redirect()->back()->with('status', 'this product has already in your order list');
            }