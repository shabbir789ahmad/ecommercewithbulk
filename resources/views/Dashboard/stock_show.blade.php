@extends('Dashboard.admin')
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
     <h4 class="text-center font-weight-bold mt-3 text-color">All Orders</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('admin/orders')}}">
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
       <form class="d-flex">
       <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-color text-light mr-2" type="button">Search</button>
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
    <th>Supplier</th>
    <th>Product</th>
    <th>Price</th>
    <th class="">Selling Price</th>
    <th >Discount </th>
    <th >Stock </th>
    <th class="text-center">Actions</th>
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
    <td class="a">
      @foreach($show->supply as $sup)
        {{ucfirst($sup['supplier_name'])}}
      @endforeach
    </td>
    <td class="a">{{ucfirst($show['product'])}}</td>
    <td class="a">{{$show['price']}}</td>
    <td class="a col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span>
     <i class="fas fa-tags discount border p-2 sell" data-id="{{$show['id']}}" data-price="{{$show['sell_price']}}"></i>
    </td>
    <td class="a col-2"><span class="bag ">
    @if($show['discount'] > '1')
  {{$show['discount']}}@else 0 @endif</span>
    <i class="fas fa-warehouse discount border p-2 dis" data-id="{{$show['id']}}"  data-price="{{$show['discount']}}"></i>
    </td>
    <td class="a col-2">{{$show['stock']}}
    
    </td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i>
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

