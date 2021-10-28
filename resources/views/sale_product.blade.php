@extends('master.master')
@section('content')
<?php 
use App\Models\Category;
$sub=Category::category();
//echo "<pre>"; print_r($sub);die;
?>
<title>Product</title>
<div class="wrapper3">
      
  <nav id="sidebar" class="shadow border-right">
 
    <p class=" filter3 ml-3 mt-5">By Brand <span class="float-right mr-2">See All</span></p>   
<div class="top_cat ml-3 filter">
  <ul class="list-unstyled">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand2('{{$br['bname']}}')" >
        <i class="fas fa-caret-right mr-2 fa-lg"></i>{{$br['bname']}}
      </a>
    </li>
    @endforeach
      
  </ul>
</div>
       <hr class="ml-3 bg-dark ">
     <div class="filter3">
      <p class="  filter3 ml-3 ">Sort By <span class="float-right mr-2">See All</span></p>
</div>
<div class="top_cat ml-3">
  <ul class="list-unstyled ">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" class="filter2">
       <span class="label">
        <input type="checkbox" name="filter_brand" >
        <label class="ml-2"> {{$br['bname']}}</label>
       </span>
      </a>
    </li>
    @endforeach
  </ul>
</div>
     <hr class="ml-3 bg-dark ">
     <div class="filter">
      <p class="  filter3 ml-3">Color <span class="float-right mr-2">See All</span></p>
      <div class="top_cat">
      <ul class="list-unstyled fl ml-3">
        @foreach($color as $pro)  
        @if($pro)   
      <li>
      <a href="javascript:void(0)" onclick="setcolor('{{$pro['color']}}') " class="filter2">
   <i class="fas fa-circle fa-2x " style="color:{{$pro['color']}};"></i>
     <span class="mb-5 ml-2">{{ucfirst($pro['color'])}}</span></a>
     </li>
     @else

     @endif
     @endforeach
      
     
          </ul>
        </div>
       </div>
  
     <hr class="ml-4 bg-dark">
    
      <p class=" ml-4 filter3">Size <span class="float-right mr-2">See All</span></p>

       <div class=" top_cat ml-4">
         @foreach($size as $pro)  
        @if($pro)  
         <a href="javascript:void(0)" onclick="setsize('{{$pro['size']}}')">
          <button class="btn btn-sm rounded  btn-secondary border text-light">{{$pro['size']}}</button>
        </a>
         @endif
         @endforeach
      </div>
    
     <hr class="mt-4 ml-4 bg-dark">

     <div class="filter">
      <p class="  filter3 ml-3 ">Price<span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
    
       <li>
      <a href="javascript:void(0)" onclick="price_filter()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price1" value="10">
       <label class="ml-2"> Under $10 doller</label>
     </span>
     </a>
     </li>
    
           <li>
      <a href="javascript:void(0)" onclick="price_filter2()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price2" value="20">
       <label class="ml-2"> Under $20  doller</label>
     </span>
     </a>
     </li>
          <li>
      <a href="javascript:void(0)" onclick="price_filter3()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price3" value="30">
       <label class="ml-2"> Under $30 doller </label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="price_filter4()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price4" value="31">
       <label class="ml-2"> Over $30 doller </label>
     </span>
     </a>
     </li>
      </ul>
   </div>
     
   
     
<hr class="mt-4 ml-4 bg-dark">
<div class="filter">
      <p class="  filter3 ml-3 ">New Arrival <span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
     
       <li>
      <a href="javascript:void(0)" onclick="newarrival()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="n" value="this">
       <label class="ml-2"> This Week</label>
     </span>
     </a>
     </li>
       <li>
      <a href="javascript:void(0)" onclick="newarrival2()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne" value="last">
       <label class="ml-2"> Last Week</label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="newarrival3()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne3" value="month">
       <label class="ml-2"> This Month</label>
     </span>
     </a>
     </li>
      </ul>
      </div>        

  </nav>

       
<div id="content" style="overflow:hidden">
  
  <h4 class=" pro mt-3">All Products</h4>



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

<button class="btn-store ml-1" id="sale-new" value="new">New Product</button>
<button class="btn-store ml-1" id="sale-rated" value="top">Top Rated</button>
<button class="btn-store ml-1">Button</button>
</div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
     <button type="button" id="sidebarCollapse" class="btn btn-info d-block d-md-none">
      <i class="fas fa-align-left "></i>
      <span>Filter</span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
     </div>
    </div>
  </nav>



 <div class="row mr-2">
   @foreach($product as $pro)
   <div class="col-sm-4 col-12 col-md-4 col-lg-4  mt-2">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">
        @foreach($pro->image as $img)
         @if($loop->first)
         <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
         @endif
        @endforeach
       </a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>

       @if($pro['discount'])
        <p class="overlay2 ">{{ceil( ($pro['discount']/$pro['sell_price'])*100)}}% </p>
       @else

       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}
        <span class="float-right ">${{$pro['sell_price'] -   $pro['discount']}}<del class="text-secondary">
         <small class="text-danger">${{$pro['sell_price']}}</small></del> 
        </span>
       </p>
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
   @endforeach
 </div>

  {{ $product->links() }}


           
   </div>
    </div>

  <form id="salee_form">
  <input type="hidden" name="sale-product" id="sale-product">
  <input type="hidden" name="sale-rate" id="sale-rate">
</form>

<form id="sell_form">
  <input type="hidden" name="sort2" id=" -sale">
  <input type="hidden" name="brand2" id="brand-sale">
</form>

<form id="sale_color_form">
  <input type="hidden" name="color2" id="color-sale">
  <input type="hidden" name="size2" id="size-sale">
</form>
<form id="new_sale_form">
  <input type="hidden" name="new2" id="new_sale">
</form>
<form id="price_form">
  <input type="hidden" name="price" id="price">
</form>
@endsection