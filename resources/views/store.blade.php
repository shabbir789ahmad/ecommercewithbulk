@extends('master.master')
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


  <div class=" d-flex store-nav-color" >

   <div class="nav-btn ml-3">
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
 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
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
       <p class="sle-e mt-2" data-eid="{{$stock['id']}}" data-edisc="{{$stock['discount']}}" data-esell="{{$stock['sell_price']}}">End Sale </p>
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








<form id="new-form">
  <input type="hidden" name="newpro" id="newpro">
  <input type="hidden" name="topr" id="topr">
  <input type="hidden" name="drop_search" id="drop_search">
</form>


@endsection