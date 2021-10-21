@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('vendor/banner')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Banner
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload Banner</h4>
   </div>
 </div>
<a href="{{url('vendor/get-banner')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/get-banner')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

 
<div class="container-fluid">
 <div class="row">
  <div class="col-md-2 col-sm-1">
  </div>
  <div class="col-md-8 card col-sm-10 border border-success mt-5 p-5">
       
   <form action="{{url('vendor/upload-banner')}}" method="POST" enctype="multipart/form-data">
        @csrf
     <label class="text-dark">Heading 1</label> 
     <div class="form-group">
      <div class="input-group clockpicker" id="clockPicker1">  
        <input type="text" name="heading1" placeholder="Heading 1 " class="form-control "  value="{{old('heading1')}}" required="">
       <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
      </div>
     </div>
     <span class="text-danger mt-3">@error('heading1') {{$message}} @enderror</span>
     <label class="text-dark">Heading 2</label> 
     <div class="form-group">
      <div class="input-group clockpicker" id="clockPicker1">  
       <input type="text" name="heading2" placeholder="Heading 2  " class="form-control "  value="{{old('heading2')}}" required="">
       <div class="input-group-append">
         <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
      </div>
     </div>
     <span class="text-danger mt-3">@error('heading2') {{$message}} @enderror</span>
     <label class="text-dark">Banner Image</label> 
     <div class="form-group">
     <div class="input-group clockpicker" id="clockPicker1">  
       <input type="file" name="banner" class="form-control "  value="{{old('banner')}}" required="">
       <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
     </div>
    </div>
    <span class="text-danger mt-3">@error('banner') {{$message}} @enderror</span> 
    
   <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
  </form>
 </div>
    <div class="col-md-2 col-sm-1">
    </div>
</div>





@endsection