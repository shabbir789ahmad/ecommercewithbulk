@extends(' Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('admin/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">All Product For This Vendor</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/stock-show')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/stock-show')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>





<div class="c mt-3" id="container-wrapper mt-4">

<div class="row ">
 <div class="col-lg-12">
  <div class="card mb-4">
    
    <div class="row mt-4 ml-2 mr-2">
     <div class="col-md-4">
      <select class="form-control" id="supplier">
        <option selected disabled hidden="">Sort By Supplier</option>
        @foreach($supply as $sup)
        <option value="{{$sup['id']}}">{{$sup['supplier_name']}}</option>
       @endforeach
      </select>
     </div>
     
     <div class="col-md-4">
      <select class="form-control" id="stock_search">
        <option selected hidden disabled="">Sort By Stock</option>
        <option value="10">Less Than 10</option>
        <option value="20">Less Than 20</option>
        <option value="30">Less Than 30</option>
        <option value="40">Less Than 40</option>
        <option value="50">Less Than 50</option>
        <option value="60">Greater Than 60</option>
      </select>
     </div>
 <div class="col-md-4">
  <form class="d-flex" action="{{url('admin/search-product')}}" method="GET">
  <div class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="Search"  aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-color text-light mr-2" type="submit">Search</button>
  </div>
</div>
</form>
     </div>
    </div>
    <div class="row mt-4 ml-2 mr-2">
     
  <div class="col-md-4">
   <select class="form-control"  id="stock_cat2">
    <option selected="" disabled hidden="" >Main Category</option>

    @foreach($main as $m)
  <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
  @endforeach
</select>

  </div>
  <div class="col-md-4">
   <select class="form-control"  id="stock_sub2">
   
   
</select>

  </div>
  <div class="col-md-4">
     <select class="form-control"  id="stock_drop2">
    
     </select>
  </div>
  </div>

 <div class="store-nav-color mt-2 py-2" style="background-color:#00A9A4;">
  <ul class="nav nav-pills ml-3" id="pills-tab" role="tablist">
  <li class="nav-item ml-2">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All Products</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Requested</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Promoted</a>
  </li>
</ul>
</div>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- Without Promoted-->
    <div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
  <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th class="col-2">Sell Price</th>
    <th >Total Stock </th>
    <th >Remaining Stock </th>
    <th class="text-center">Actions</th>
    <th class="text-center">Promote</th>
   </tr>
  </thead>
  <tbody>

   @foreach($stock as $show)

   <tr>
    <td class="a col-1">
      @foreach($show->image as $img)
      <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
      @endforeach
    </td>
    
    <td class="a col-2">{{$show->product}}</td>
    <td class="a col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span></td>
    <td class="a col-2">{{$show['stock']+ $show['sold_stock']}}</td>
    <td class="a col-2">{{$show['stock'] }}</td>
    
    <td>
      <div class="b d-flex justify-content-center mt-1">
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
       <a href="{{url('admin/cancel-stock/'.$show['id'])}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>
      </div> 
    </td>
    @foreach($show->sponser as $spn)
    @if($spn['sponser'] && $spn['sponser_status']=='1')
    <td class="a "><span class="badge badge-success py-1">Sponsered</span></td>
    @elseif($spn['sponser'] && $spn['sponser_status']=='0')
     <td class="a "><span class="badge badge-primary py-3">Requested</span></td>
    @endif
    @endforeach
   </tr>
       @endforeach
         </tbody>
         </table>
       </div>

{{ $stock->links() }}
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- Requested for promotion-->
    <div class="table-responsive p-3">
    <table class="table align-items-center table-flush" id="dataTable">
      <thead class="thead-light">
       <tr>
        <th>Image</th>
        <th>Product</th>
        <th class="col-2">Sell Price</th>
        <th >Total Stock </th>
        <th >Remaining Stock </th>
        @foreach($stock as $show)
          @foreach($show->sponser as $sp)
        <th > Sponser</th>
        <th>Approve Sponser</th>
        @endforeach
        @endforeach
        <th class="text-center">Actions</th>
       </tr>
      </thead>
      <tbody>

      @foreach($stock as $show)
      @foreach($show->sponser as $sponser)
      @if($sponser['sponser']&& $sponser['sponser_status']=='0')
      <tr>
       <td class="a col-1">
         @foreach($show->image as $img)
      <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
         @endforeach
       </td>
    
       <td class="a col-2">{{$show->product}}</td>
       <td class="a col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span></td>
       <td class="a col-2">{{$show['stock']+ $show['sold_stock']}}</td>
       <td class="a col-2">{{$show['stock'] }}</td>
       @foreach($show->sponser as $sponser)
       <td class="a col-2"><span class="badge badge-primary py-3">Requested</span></td>
       <td class="a sponser" ><input type="checkbox" data-id="{{ $sponser['id'] }}" name="sponser_status" class="js-switchspon" 
       {{ $sponser->sponser_status == 1 ? 'checked' : '' }} ></td>
       @endforeach
      <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
        <a href="{{url('admin/cancel-stock/'.$show['id'])}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>

       </div> 
    </td>
   </tr>
         @endif
         @endforeach
         @endforeach
         </tbody>
         </table>
       </div>
    {{ $stock->links() }}
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!-- Requested for promotion-->
    <div class="table-responsive p-3">
    <table class="table align-items-center table-flush" id="dataTable">
      <thead class="thead-light">
       <tr>
        <th>Image</th>
        <th>Product</th>
        <th class="col-2">Sell Price</th>
        <th >Total Stock </th>
        <th >Remaining Stock </th>
        @foreach($stock as $show)
          @foreach($show->sponser as $sp)
        <th > Sponser</th>
        <th>Approve Sponser</th>
        @endforeach
        @endforeach
        <th class="text-center">Actions</th>
       </tr>
      </thead>
      <tbody>

      @foreach($stock as $show)
      @foreach($show->sponser as $sponser)
      @if($sponser['sponser_status']=='1')
      <tr>
       <td class="a col-1">
         @foreach($show->image as $img)
      <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
         @endforeach
       </td>
    
       <td class="a col-2">{{$show->product}}</td>
       <td class="a col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span></td>
       <td class="a col-2">{{$show['stock']+ $show['sold_stock']}}</td>
       <td class="a col-2">{{$show['stock'] }}</td>
       @foreach($show->sponser as $sponser)
       <td class="a col-2"><span class="badge badge-success py-3">Sponser</span></td>
       <td class="a sponser" ><input type="checkbox" data-id="{{ $sponser['id'] }}" name="sponser_status" class="js-switchspon" 
       {{ $sponser->sponser_status == 1 ? 'checked' : '' }} ></td>
       @endforeach
      <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
        <a href="{{url('admin/cancel-stock/'.$show['id'])}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>

       </div> 
    </td>
   </tr>
         @endif
         @endforeach
         @endforeach
         </tbody>
         </table>
       </div>

{{ $stock->links() }}
  </div>
</div>

  </div>
  </div>
</div>
</div>
  
<form id="drop_form">
  <input type="hidden" name="drop_category" id="drop">
</form>


<form id="supply_form">
  <input type="hidden" name="supply" id="supply">
</form>
<form id="stock_form">
  <input type="hidden" name="stock1" id="stock1">
</form>



 @endsection

