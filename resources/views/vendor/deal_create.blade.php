@extends('vendor.dashboard')
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
  <h4 class="text-center font-weight-bold text-color">Upload Product</h4>
   </div>
 </div>

<a href="{{url('vendor/all-deals')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2 d-none d-md-block">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/all-deals')}}">
 <div class="card shadow  p-0 mr-3 d-none d-md-block ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Create Deal
    </h4>
            
<form action="{{url('vendor/deals')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf
 <div class="row">
  <div class="col-md-6 ">
    <label class="font-weight-bold text-color">Deal Name</label>
    <div class="form-group mb-1">
     <div class="input-group clockpicker" id="clockPicker1">   
      <input type="text" name="deal_name" placeholder="Pack Of 3 - 1 Wax Heater, 100grm Beans And 5 Sticks.." class="form-control "  value="{{old('deal_name')}}" required><br>
      <div class="input-group-append">
       <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>                      
     </div>
    </div>
    <span class="text-danger">@error('deal_name') {{$message}} @enderror</span>
    <label class="font-weight-bold text-color">Deal Details</label>
    <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">   
     <textarea name="deal_detail" placeholder="Pack Of 3 - 1 Wax Heater, 100grm Beans And 5 Sticks.." class="form-control " value="{{old('deal_detail')}}" required ></textarea>
     <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-tag"></i></span>
     </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_detail') {{$message}} @enderror</span>
   <label class="font-weight-bold text-color">Deal Price</label>
   <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="deal_price" placeholder="5000" class="form-control "  value="{{old('deal_price')}}" required=""><br>
     <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-tag"></i></span>
     </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_price') {{$message}} @enderror</span>
   <span class="text-danger">@error('deal_image') {{$message}} @enderror</span>
   <label class="font-weight-bold text-color mb-0">Image</label>
   <div class="custom-file mt-2 ">
    <input type="file" name="image" class="custom-file-input" id="images"   required accept="image/*" />
     <label class="custom-file-label" for="images">Choose image</label>
   </div> 
   <div class="user-image mb-3 text-center" >
    <div class="imgPreview" > </div>
   </div> 
  </div>
  <div class="col-md-6">
    <label class="font-weight-bold text-color">Deal Start Date</label>
   <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">
      <input type="datetime-local" name="deal_start_date" placeholder=" Deal Start Date" class="form-control " value="{{old('deal_start_date')}}" required="">
      <div class="input-group-append">
       <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
      </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_start_date') {{$message}} @enderror</span>
   <label class="font-weight-bold text-color">Deal End Date</label>
   <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">
      <input type="datetime-local" name="deal_end_date" placeholder=" Deal End Date" class="form-control " value="{{old('deal_end_date')}}" required="">
      <div class="input-group-append">
       <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
      </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_end_date') {{$message}} @enderror</span>
   <label>Select Products</label>
   
   <div class="form-group">
    <div class="input-group clockpicker" id="clockPicker1">
      <select class="form-control" id="deal" name="product_id[]" multiple>
        <option disabled selected hidden>select product</option>
        @foreach($product as $pro)
        <option value="{{$pro['id']}}">{{$pro['product']}}</option>
        @endforeach
      </select>
      <div class="input-group-append">
       <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
      </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_end_date') {{$message}} @enderror</span>
  </div>
 </div>

 
 <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
 
 </div>



</div>
</div>

 


 </form>
<div class="modal fade" id="supply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/add-supplier')}}" method="POST">
          @csrf
      
      <label>Name</label>
      <input type="text" name="supplier_name" placeholder="name" class="form-control" >
      <span class="text-danger">@error ('supplier_name'){{$message}}@enderror</span>
      <label>Address </label>
      <input type="text" name="address" placeholder="Address" class="form-control" >
      <span class="text-danger">@error ('address'){{$message}}@enderror</span>
     <label>Phone </label>
      <input type="text" name="phone" placeholder="Phone" class="form-control" >
      <span class="text-danger">@error ('phone'){{$message}}@enderror</span>
     
      
      <button class="btn btn-color btn-lg float-right text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/upload-brand')}}" method="POST">
          @csrf
      
      <label>Name</label>
      <input type="text" name="bname" placeholder="Brand Name" class="form-control" />
      <span class="text-danger">@error ('bname'){{$message}}@enderror</span>
     
    
     
      
      <button class="btn btn-color btn-lg float-right text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>
@endsection
