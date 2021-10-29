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
     <h4 class="text-center font-weight-bold mt-3 text-color">All Product</h4>
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
  
   
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
  <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Eamil</th>
    <th > Phone</th>
    <th class="text-center">Status </th>
   
    <th class="text-center">Actions</th>
   </tr>
  </thead>
  <tbody>

   @foreach($vendor as $show)
   <tr>
    <td class="a col-1">
      <img  src="{{asset('uploads/img/' .$show['image'])}}" class="card-img-top" alt="...">
    </td>
    <td class="a col-2">{{$show->name}}</td>
    <td class="a col-2">{{$show->email}}</td>
    <td class="a col-2">{{$show->phone}}</td>
    
    <td class="a col-2" ><input type="checkbox" data-id="{{ $show['id'] }}" name="vendor_status" class="js-switchv" 
     {{ $show->vendor_status == 1 ? 'checked' : '' }} ></td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{url('admin/vendor-product/' .$show['id'])}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-vendor/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1" ><i class="fas fa-trash-alt  text-danger "></i>
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

