@extends('vendor.dashboard')
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
    <th >Stocks </th>
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
    <td class="a col-2">{{$show->product}}</td>
    <td class="a " ><input type="checkbox" data-id="{{ $show['id'] }}" name="product_status" class="js-switch" 
     {{ $show->product_status == 1 ? 'checked' : '' }} ></td>
    
    @foreach($show->stock2 as $st)
    <td class="a">{{$st['price']}}</td>
    <td class="a col-2"><span class="bag ">  {{ucfirst($st['sell_price'])}}</span>
     
    </td>
    <td class="a col-2"><span class="bag ">
    @if($st['discount'] > '1')
  {{$st['discount']}}@else 0 @endif</span>
    </td>
    @endforeach
    <td class="a col-2">{{$show->total}}</td>
    <td class="a col-2">{{$show->count}}</td>
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

