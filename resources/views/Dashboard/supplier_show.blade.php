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

<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4">
 
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
  <th class="text-center">Actions</th>
    </tr>
    </thead>
                    
   <tbody>
  
   @foreach($supply as $show)
   <tr>
   
      
    <td class="a">{{ucfirst($show['supplier_name'])}}</td>
    <td class="a">{{ucfirst($show['address'])}}</td>
    <td class="a">{{$show['phone']}}</td>
  
    
   


    

    <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i>
       </a>
       <a href="{{'delete-supplier/'.$show['id']}}" class="border ml-1 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"></i>
       </a>
      </div> 
    </td>
   </tr>
 
         @endforeach
         </tbody>
         </table>
       </div>

{{ $supply->links() }}
  </div>
  </div>
</div>
</div>
  

<form id="supply_form">
  <input type="hidden" name="supply" id="supply">
</form>
<form id="stock_form">
  <input type="hidden" name="stock1" id="stock1">
</form>


<div class="modal fade" id="sell_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/upate-price')}}" method="POST">
          @csrf
      <input type="text" name="id" id="sell_id">
      <label>Product Selling Price</label>
      <input type="text" name="sell_price"  class="form-control" id="sell_price">
     <br>
      
      <button class="btn btn-color float-right  text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="stock_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/upate-stock')}}" method="POST">
          @csrf
      <input type="hidden" name="id" id="stock_id">
      <label>Price Per Product</label>
      <input type="text" name="price" class="form-control" id="price">
      <label>New Stock </label>
      <input type="text" name="stock" class="form-control" id="stock">
     
      
      <button class="btn btn-color btn-lg float-right text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>

 @endsection

