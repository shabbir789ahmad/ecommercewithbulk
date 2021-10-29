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

@if($sale)
   @foreach($sale as $sal)
    @if($sal['end_time']>=$date)
     <div class="card-heade border mt-5 d-inline-block rounded-top  py-3 w-100">
      <div class="row">
        <div class="col-md-6">
         <div class="sale">
      @foreach($sale as $sal)
        <h2 class="font-weight-bold ml-3 text-dark ">{{ucwords($sal['sell_name'])}}</h2>
       
     @endforeach
    </div>
        </div>
        <div class="col-md-6">
         <div class="d-flex ml-auto">
        <p class="ml-auto text-dark font-weight-bold">Sale End In 
         <div id="time mr-5" class="d-flex ml-5">
          <p id="d" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="h" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="m" class="p-1 bg-time ml-2 text-light">f</p>
          <p id="s" class="p-1 bg-time ml-2 text-light">f</p>
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
         <div class="dropdown">
          <ul>
            @foreach($sub as $cat)
            <li class="dropdown-link" >
             <a href="#">{{ucwords($cat['category'])}}<i class="fas fa-caret-down"></i></a>
              <div class="dropdown second">
               <ul>
                @foreach($cat['subcat'] as $subc)
                <li class="dropdown-link">
                 <a href="#">{{ucwords($subc['smenue'])}}<i class="fas fa-caret-down"></i></a>
                 <div class="dropdown second">
                 <ul>

                  @php //dd($c->dropdown); @endphp
                  @foreach($cat['drop'] as $drp)
                  @if($subc['id']==$drp['dropdown_id'] )
                  <li class="dropdown-link store-drop"  value="{{$drp['id']}}">
                   <a >{{ucwords($drp['name'])}}</a>
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
<button class="btn-store ml-1">Button</button>
</div>

<div class="container-fluid mt-2 ml-2 mb-5">
 <ul class="nav nav-pills mb-3 mt-2 justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item mr-2 ">
    <a class="nav-link  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Without Sale</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">On Sale</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
    @foreach($product as $pro)
    @foreach($pro->stock as $stock)
    @if(!$stock['on_sale'])
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
          <p class="sle mt-2" data-id="{{$stock['id']}}" data-sel="{{$stock['sell_price']}}" data-desco="{{$stock['discount']}}">Apply Sale </p>
         </div>
        @endif
        @endforeach
        <div class="over-text2">
          <p class="sle2 text-danger mt-2" data-id="{{$stock['id']}}">{{ceil( ($stock['discount']/$stock['sell_price'])*100)
           }}%</p>
        </div>
       
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($pro['product'])}}<span class="float-right ">${{$stock['sell_price'] - $stock['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$stock['sell_price']}}</small></del>  </span>
      </p>
      </div>
       @endforeach
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
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- without sale product slider-->
   <div class="container-fluid mt-4">
    <div class="owl-carousel owl-theme ml-2">
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
       <p class="sle-end mt-2" data-eid="{{$stock['id']}}" data-edisc="{{$stock['discount']}}" data-esell="{{$stock['sell_price']}}">End Sale </p>
       </div>
       @endif
       @endforeach
        <div class="over-text2 ">
          <p class="sle2  text-danger mt-2" data-id="{{$stock['id']}}">{{ceil( ($stock['discount']/$stock['sell_price'])*100)
           }}%</p>
        </div>
        @endforeach
       </div>
      <div class="card-body p-0">
       <p class="f font-weight-bold ml-1 mt-2">{{ucwords($pro['product'])}}<span class="float-right ">${{$stock['sell_price'] - $stock['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$stock['sell_price']}}</small></del>  </span>
      </p>
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
        <form method="POST" action="{{url('vendor/on-sale')}}">
          @csrf
        <input type="hidden" name="id" id="sid">
        <label>SAle Name</label>
        <select class="form-control" name="sell_id">
        @foreach($sale as $sl)
        <option value="{{$sl['id']}}">{{$sl['sell_name']}}</option>
        @endforeach
         </select>
        <label>New Price</label>
        <input type="text" class="form-control" name="sell_price" id="seller">
        <label>New Discount</label>
        <input type="text" class="form-control" name="discount" id="discounter">
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">Update</button>
     </form> 
     </div>
      
       
    </div>
  </div>
</div>


<!--put product on Modal -->
<div class="modal fade" id="endsale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disable Sale From This Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('vendor/out-sale')}}">
          @csrf
        <input type="hidden" name="id" id="eid">
        <label>Update New Price</label>
        <input type="text" class="form-control" name="sell_price" id="sell-end">
        <label class="mt-2">Update New Discount</label>
        <input type="text" class="form-control" name="discount" id="dis">
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">End Sale</button>
     </form> 
     </div>
      
       
    </div>
  </div>
</div>


<form id="new-form">
  <input type="hidden" name="newpro" id="newpro">
  <input type="hidden" name="topr" id="topr">
  <input type="hidden" name="drop_search" id="drop_search">
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
 // alert(strt)
    var t=endtime-strt;
//alert(t)
    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("d").innerHTML= ("0" + da).slice(-2) +
"<span class='d'>d</span>";

document.getElementById("h").innerHTML= ("0" + hr).slice(-2) +
"<span class='d'>h</span>";

document.getElementById("m").innerHTML= ("0" + ms).slice(-2) +
"<span class='d'>m</span>";

document.getElementById("s").innerHTML= ("0" + sc).slice(-2) +
"<span class='d'>s</span>";
    }else{

    }
  },1000);
</script>
@endsection