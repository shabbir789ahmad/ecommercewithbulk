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
      <input type="text" name="deal_name" placeholder="Pack Of 3 - 1 Wax Heater....." class="form-control "  value="{{old('deal_name')}}" required><br>
      <div class="input-group-append">
       <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>                      
     </div>
    </div>
    <span class="text-danger">@error('deal_name') {{$message}} @enderror</span>
    <label class="font-weight-bold text-color">Deal Details</label>
    <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">   
     <textarea name="deal_detail" placeholder="Deal detail....." class="form-control " value="{{old('deal_detail')}}" required ></textarea>
     <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-tag"></i></span>
     </div>                      
    </div>
   </div>
   <span class="text-danger">@error('deal_detail') {{$message}} @enderror</span>
   <label class="font-weight-bold text-color">Deal Price</label>
   <div class="form-group mb-1">
    <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="deal_price" placeholder="price like 5000 ....." class="form-control "  value="{{old('deal_price')}}" required=""><br>
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
   <label class="font-weight-bold text-color">Select Main Category</label>
   
   <div class="form-group">
    <div class="input-group clockpicker" id="clockPicker1">
      <select class="form-control maincat"  name="" >
        <option disabled selected hidden>select Category</option>
        @foreach($product as $pro)
        <option value="{{$pro['id']}}">{{$pro['category']}}</option>
        @endforeach
      </select>
      <div class="input-group-append">
       <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
      </div>                      
    </div>
   </div>
   <span class="text-danger">@error('product-id') {{$message}} @enderror</span>
   <label class="font-weight-bold text-color">Select Products</label>
   
   <div class="form-group">
    <div class="input-group clockpicker" id="clockPicker1">
      <select class="form-control deal" id="deal" name="" >
        
      </select>
      <div class="input-group-append">
       <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
      </div>                      
    </div>
   </div>
   <span class="text-danger">@error('product-id') {{$message}} @enderror</span>
    
    <table id="records_table" class="table align-items-center table-flush records_table" >
    <tr>
        <th>Name</th>
        <th>Name</th>
        <th>Price</th>
        <th>Discount</th>
    </tr>
   </table>
    </div>
  </div>
 </div>

 
 <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
 
 </div>



</div>
</div>

 


 </form>

</div>
@endsection
