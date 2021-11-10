@extends(' vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="c ml-  d-flex mr-1">

    <a href="{{url('vendor/dashboard')}}">
    <div class="card shadow border p-0 d-none d-md-block">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Dashboard
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-100 w-md-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">All Product</h4>
   </div>
 </div>

<a href="{{url('vendor/stock-show')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2 d-none d-md-block">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/stock-show')}}">
 <div class="card shadow  p-0 mr-3 d-none d-md-block ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
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
   <select class="form-control"  id="stock_cat">
    <option selected="" disabled hidden="" >Main Category</option>

    @foreach($main as $m)
  <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
  @endforeach
</select>

  </div>
  <div class="col-md-4">
   <select class="form-control"  id="stock_sub">
   
   
</select>

  </div>
  <div class="col-md-4">
     <select class="form-control"  id="stock_drop">
    
     </select>
  </div>
  
</div>
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
  <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th > Status</th>
    <th>Price</th>
    <th class="col-2">Sell Price</th>
    <th >Discount </th>
    <th >Total Stock </th>
    <th >Remaining Stock </th>

    <th class="text-center">Actions</th>
   </tr>
  </thead>
  <tbody>

   @foreach($stock as $show)
   <tr>
    <td class=" col-1">
      @foreach($show->image as $img)
      <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
      @endforeach
    </td>
    <td class=" col-2">{{$show->product}}</td>
    <td class=" " ><input type="checkbox" data-id="{{ $show['id'] }}" name="product_status" class="js-switch" 
     {{ $show->product_status == 1 ? 'checked' : '' }} ></td>
    
    
    <td class="">{{$show['price']}}</td>
    <td class=" col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span>
     
    </td>
    <td class="col-2"><span class="bag ">
    @if($show['discount'] > '1')
  {{$show['discount']}}@else 0 @endif</span>
    </td>
   
    <td class=" col-2">{{$show->stock}}</td>
    <td class=" col-2">{{$show['stock'] - $show['sold_stock']}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'cancel-stock/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>

       </div> 
    </td>
   </tr>
 
         @endforeach
         </tbody>
         </table>
       </div>

{{ $stock->links() }}
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

