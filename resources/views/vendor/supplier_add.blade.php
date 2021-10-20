@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('vendor/dashboard')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Dashboard
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload Supplier</h4>
   </div>
 </div>

<a href="{{url('vendor/supplier-show')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/supplier-show')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Upload Supplier
    </h4>
            
<form action="{{url('vendor/add-supplier')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 <div class="row">

<div class="col-md-12">

   <h5>Supplier Info</h5>  
   <span class="text-danger">@error('supplier_name') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="supplier_name" placeholder="Supplier Name" class="form-control "  value="{{old('supplier_name')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
  <span class="text-danger">@error('address') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="address" placeholder="Suplier address" class="form-control "  value="{{old('address')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
 <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="phone" placeholder="Supplier phone" class="form-control "  value="{{old('phone')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>       


</div>
</div>
           


   
  <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
  </form>
 </div>        
</div>
</div>

 




@endsection
