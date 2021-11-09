@extends('vendor.dashboard')
@section('content')
<?php 
use App\Models\Category;
$sub=Category::category();
//echo "<pre>"; print_r($sub);die;
?>

@foreach($banner as $bann)
<div class="store-banner">
 <img src="{{asset('uploads/img/' .$bann['banner'])}}"  >

 <div class="txt">
  <p class="dis">60% Discount</p>
<h4 class="">{{ucfirst($bann['heading1'])}}</h4>
<p class="best">{{ucfirst($bann['heading2'])}}</p>
 <button class="btn btn-xl btn-store text-light rounded"> Shop Now</button>
 </div>
</div>
@endforeach

<h4 class=" pro mt-5">All Products</h4>
@foreach($sale as $sl)
  <p class="text-center">Put Your Product In <span class="text-danger font-weight-bold">{{ucwords($sl['sell_name'])}}<span></p>
  @endforeach
<br>
<h6 class="font-weight-bold ml-1 ml-md-3 pro2">Sale By Admin</h6>
  @if($sale)
  @foreach($sale as $sal)
  @if($sal['end_time']>=$date)
     <div class="card-heade border d-inline-block rounded-top  py-3 w-100">
      <div class="row">
        <div class="col-md-6">
         <div class="sale">
          @foreach($sale as $sal)
           <h4 class="font-weight-bold ml-3 text-dark ">{{ucwords($sal['sell_name'])}}</h4>
          @endforeach
         </div>
        </div>
        <div class="col-md-6">
         <div class="d-flex ml-auto">
           <p class="ml-auto text-dark font-weight-bold">Sale End In 
           <div id="time mr-5" class="d-flex ml-5">
             <p id="day" class="p-1 bg-time ml-2  text-light">f</p>
             <p id="hour" class="p-1 bg-time ml-2 text-light">f</p>
             <p id="minute" class="p-1 bg-time ml-2 text-light">f</p>
            <p id="second" class="p-1 bg-time ml-2 text-light">f</p>
         </div>
       </p>
       </div>
        </div>
      </div>
     </div>
  @endif
  @endforeach
  @endif
<br>
<h6 class="font-weight-bold ml-1 ml-md-3 mt-3 pro2">Your Sale</h6>
@if($vendorsale)
   @foreach($vendorsale as $sal)
    @if($sal['sale_end']>=$date)
     <div class="card-heade border  d-inline-block rounded-top  py-3 w-100">
      <div class="row">
        <div class="col-md-6">
         <div class="sale">
          @foreach($vendorsale as $sal)
           <h4 class="font-weight-bold ml-3 text-dark ">{{ucwords($sal['sale_name'])}}</h4>
          @endforeach
         </div>
        </div>
        <div class="col-md-6">
         <div class="d-flex ml-auto">
        <p class="ml-auto text-dark font-weight-bold">Sale End In 
         <div id="time2" class="d-flex ml-5">
          <p id="day2" class="p-1 bg-time ml-2  text-light">f</p>
          <p id="hour2" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="minute2" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="second2" class="p-1 bg-time ml-2 text-light">f</p>
         </div>
       </p>
       </div>
        </div>
      </div>
     </div>
  @endif
  @endforeach
  @endif
  <div class="container d-flex store-nav-color" >

   <div class="nav-btn ">
     <div class="nav-links">
      <ul>
       <li class="nav-link fhg" style="--i: .85s">
        <a href="#">Category<i class="fas fa-caret-down"></i></a>
         <div class="dropdown2">
          <ul>
            @foreach($sub as $cat)
            <li class="dropdown2-link" >
             <a href="#">{{ucwords($cat['category'])}}<i class="fas fa-caret-down"></i></a>
              <div class="dropdown2 second">
               <ul>
                @foreach($cat['subcat'] as $subc)
                <li class="dropdown2-link">
                 <a href="#">{{ucwords($subc['smenue'])}}<i class="fas fa-caret-down"></i></a>
                 <div class="dropdown2 second">
                 <ul>
                  @foreach($cat['drop'] as $drp)
                  @if($subc['id']==$drp['dropdown_id'] )
                  <li class="dropdown2-link  store-drop"  value="{{$drp['id']}}">
                   <a href="javascript:void(0)">{{ucwords($drp['name'])}}</a>
                  </li>
                   @endif
                 
                  @endforeach
                  <div class="arrow"></div>
               </ul>
              </div>
            </li>
            @endforeach
            <div class="arrow"></div>
          </ul>
        </div>
       </li>
       @endforeach
       <div class="arrow"></div>
     </ul>
    </div>
   </li>
  </ul>
</div>
</div>

<button class="btn-store ml-1" id="new" value="new">New Product</button>
<button class="btn-store ml-1" id="top-rated" value="top">Top Rated</button>
<button class="btn-store ml-1" id="promoted" value="prom">Promoted</button>
</div>

<div class="container-fluid mt-2 ml-2 mb-5">
 <ul class="nav nav-pills mb-3 mt-2 justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item mr-2 ">
    <a class="nav-link  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Without Sale</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Admin Sale</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Your Sale Product</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($products as $product)
     @if(!$product['on_sale'] && !$product['vendor_on_sale'])
     <div class="item">
      <div class="card store-card ">
       <div class="overly">
        <a href="{{url('vendor/stock-detail/' .$product['id'])}}">
          @foreach($product->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
       
        @foreach($sale as $sl)
        @if($sl['end_time']>= $date)
         <div class="over-text">
          <p class="sle mt-2" data-id="{{$product['id']}}" data-sel="{{$product['sell_price']}}" data-desco="{{$product['discount']}}" data-said="{{$product['id']}}">Apply Sale </p>
         </div>
         @if($product['sponser'] && $product['sponser_end'] >$date)

         @else
         <div class="over-text3">
          <p class="promote mt-2" data-id="{{$product['id']}}" >Promote </p>
         </div>
         @endif
        @endif
        @endforeach
        <div class="over-text2">
          <p class="sle2 text-danger mt-2" data-id="{{$product['id']}}">{{ceil( ($product['discount']/$product['sell_price'])*100)
           }}%</p>
        </div>
       
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($product['product'])}}<span class="float-right ">${{$product['sell_price'] - $product['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$product['sell_price']}}</small></del>  </span>
      </p>
      </div>
     
      <div class="card-footer">
       <div class="text-center rating">
        @for($i=0; $i<5; $i++)
        @if($i<$product['rating'])
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
</div>
</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($products as $product)
    @if($product['on_sale'] )
     <div class="item">
      <div class="card store-card shadow">
       <div class="overly">
        <a href="{{url('vendor/stock-detail/' .$product['id'])}}">
          @foreach($product->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
   
       @foreach($sale as $sl)
       
      @if($sl && $sl['end_time']>= $date )
     <a href="{{url('vendor/out-sale/'.$product['id'])}}"><div class="over-text4">
       <p class="sle-end mt-2" >End Sale</p> 
       </div></a>
       
       @endif
       @if($sl && $product['new_price'] && $product['discounts'])

        <div class="over-text2 ">
          <p class="sle2  text-danger mt-2" data-id="{{$product['id']}}">{{ceil( ($product['discounts']/$product['new_price'])*100)
           }}%</p>
        </div>
      @endif
   
       @endforeach
        
     
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($product['product'])}}<span class="float-right ">${{$product['new_price'] - $product['discounts']}}<del class="text-secondary">
       <small class="text-danger">${{$product['new_price']}}</small></del>  </span>
      </p>
      </div>
      <div class="card-footer">
       <div class="text-center rating">
        @for($i=0; $i<5; $i++)
        @if($i<$product['rating'])
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

</div>
</div>
  </div>

  <!-- on sale vendor product-->
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!-- vendor product-->
    <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($products as $product)
    @if( $product['vendor_on_sale'])
     <div class="item">
      <div class="card store-card shadow">
       <div class="overly">
        <a href="{{url('vendor/stock-detail/' .$product['id'])}}">
          @foreach($product->image as $img)
           <img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
          @endforeach
        </a>
   
       @foreach($vendorsale as $sl)
       
      @if($sl && $sl['sale_end']>= $date )
     <a href="{{url('vendor/vendor-out-sale/'.$product['id'])}}"><div class="over-text4">
       <p class="sle-end mt-2" >End Sale</p> 
       </div></a>
       
       @endif
       @if($sl && $product['vendor_new_price'] && $product['vendor_discount'])

        <div class="over-text2 ">
          <p class="sle2  text-danger mt-2" data-id="{{$product['id']}}">{{ceil( ($product['vendor_discount']/$product['vendor_new_price'])*100)
           }}%</p>
        </div>
      @endif
   
       @endforeach
        
     
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($product['product'])}}<span class="float-right ">${{$product['vendor_new_price'] - $product['vendor_discount']}}<del class="text-secondary">
       <small class="text-danger">${{$product['vendor_new_price']}}</small></del>  </span>
      </p>
      </div>
      <div class="card-footer">
       <div class="text-center rating">
        @for($i=0; $i<5; $i++)
        @if($i<$product['rating'])
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

</div>
</div>
  </div>

</div>
 </div>








<!--put product on Modal -->
<div class="modal fade" id="modalsale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Put Product On Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <button type="button" id="from1" class="btn btn-color text-light">Admin Sale</button>
        <button type="button" id="from2" class="btn btn-color text-light">Your Sale</button>
        
        <div class="form1" style="display: none;">
        <form method="POST" action="{{url('vendor/on-sale')}}">
          @csrf
        <input type="hidden" name="id" id="sid">
        <input type="hidden" name="sale_id" id="sale_id">
        <label class="mt-3">Select Sale </label>
       
        <select class="form-control" name="sell_id">
        @foreach($sale2 as $sl)
        <option value="{{$sl['id']}}">{{ucwords($sl['sell_name'])}}</option>
        @endforeach
         </select>
        
        <label>New Price</label>
        <input type="text" class="form-control" name="new_price" id="seller">
        <label>New Discount</label>
        <input type="text" class="form-control" name="discounts" id="discounter">
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">Save</button>
     </form> 
   </div>

   <div class="form2" style="display: none;">
        <form method="POST" action="{{url('vendor/vendor-on-sale')}}">
          @csrf
        <input type="hidden" name="id" id="sid2">
        <input type="hidden" name="vendor_sale_id" id="sale_id2">
        <label class="mt-3">Select Sale </label>
       
        <select class="form-control" name="vendor_sell_id">
        @foreach($vendorsale2 as $sl)
        <option value="{{$sl['id']}}">{{ucwords($sl['sale_name'])}}</option>
        @endforeach
         </select>
        
        <label>New Price</label>
        <input type="text" class="form-control" name="vendor_new_price" id="seller2">
        <label>New Discount</label>
        <input type="text" class="form-control" name="vendor_discount" id="discounter2">
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">Save</button>
     </form> 
   </div>
     </div>
      
       
    </div>
  </div>
</div>





<!--promote Modal -->
<div class="modal fade" id="promote_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Promote Your Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/sponser-product')}}" method="Post">
        @csrf
          <input type="hidden" name="sponser_id" id="spid">
          <select class="form-control desponser" name="sponser" required readonly>
           <option value="1">Sponser </option>
           </select>
       
          <label class="mt-2">Start Time</label>
          <input type="datetime-local" name="sponser_start" class="form-control" id="sponser_start">
          <label class="mt-2">New End Time</label>
          <input type="datetime-local" name="sponser_end" class="form-control" id="sponser_end2">
          
      
         <button type="submit" class="btn btn-primary mt-3 float-right">Save changes</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

<form id="new-form">
  <input type="hidden" name="newpro" id="newpro">
  <input type="hidden" name="topr" id="topr">
  <input type="hidden" name="drop_search" id="drop_search">
  <input type="hidden" name="promoted" id="promot">
</form>


<script>
 @php
 $en='';
foreach($sale as $sal)
{
  $en = strtotime($sal->end_time)*1000 ;
}
@endphp

var endtime={{ $en}};

 
  var timer=setInterval(function(){
  var strt=new Date().getTime();
    var t=endtime-strt;
    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("day").innerHTML= ("0" + da).slice(-2) +
"<span class='d'>d</span>";

document.getElementById("hour").innerHTML= ("0" + hr).slice(-2) +
"<span class='d'>h</span>";

document.getElementById("minute").innerHTML= ("0" + ms).slice(-2) +
"<span class='d'>m</span>";

document.getElementById("second").innerHTML= ("0" + sc).slice(-2) +
"<span class='d'>s</span>";
    }else{

    }
  },1000);
</script>  


<script>
 @php
 $en='';
foreach($vendorsale as $sal)
{
  $en = strtotime($sal->sale_end)*1000 ;
}
@endphp

var endtimes={{ $en}};

 
  var timer=setInterval(function(){
  var strt=new Date().getTime();
    var t=endtimes-strt;
    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("day2").innerHTML= ("0" + da).slice(-2) +
"<span class='d'>d</span>";

document.getElementById("hour2").innerHTML= ("0" + hr).slice(-2) +
"<span class='d'>h</span>";

document.getElementById("minute2").innerHTML= ("0" + ms).slice(-2) +
"<span class='d'>m</span>";

document.getElementById("second2").innerHTML= ("0" + sc).slice(-2) +
"<span class='d'>s</span>";
    }else{

    }
  },1000);
</script>
@endsection