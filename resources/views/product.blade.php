@extends('master.master')
@section('content')
<title>Product</title>
<div class="wrapper3">
      
  <nav id="sidebar" class="shadow border-right">
 
    <p class=" filter3 ml-3 mt-5">By Brand <span class="float-right mr-2">See All</span></p>   
<div class="top_cat ml-3 filter">
  <ul class="list-unstyled">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" >
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
     <i class="fas fa-circle fa-2x " style="color: {{$pro['color']}};"></i>
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

       
<div id="content">

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
  <div class="col-sm-4 col-12 col-md-4 col-lg-3  mt-2">
  <a href="{{url('productpage/' .$pro->id)}}">
   <div class="card ">
    @foreach($pro->image as $img)
    <img  src="{{asset('uploads/img/' .$img->rimage)}}" class="card-img-top2 img-fluid" alt="...">
    @endforeach
     <div class="card-body">
       <p class="card-title oproduct-name">{{ucfirst($pro->product)}} <br>
       <span class="text-secondary inck">{{ucfirst($pro['detail'])}}
        </span><br>
        @foreach($pro->stock2 as $st)
      <span class="o_pice">{{$st['sell_price'] - $st['discount'] }}<del class="text-secondary">
       <small class="text-danger">{{$st->sell_price}}</small></del></span> @endforeach </p>
       
       </div>
    </div></a>
      </div>
      @endforeach
</div>

  {{ $product->links() }}


           
   </div>
    </div>

   
<form id="sort_form">
  <input type="hidden" name="sort2" id="sort2">
  <input type="hidden" name="brand2" id="brand2">
</form>

<form id="color_form">
  <input type="hidden" name="color2" id="color2">
  <input type="hidden" name="size2" id="size2">
</form>
<form id="new_form">
  <input type="hidden" name="new2" id="new2">
</form>
<form id="price_form">
  <input type="hidden" name="price" id="price">
</form>
@endsection