@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('admin/dashboard')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Dashboard
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color"></h4>
   </div>
 </div>

<a href="{{url('admin/get-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/get-product')}}">
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
 <i class="fab fa-product-hunt"></i> Front Page Categories
    </h4>
            
<form action="{{url('admin/front')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 
 <div class="row">
 <div class="col-md-6">
    <label class="text-danger">Top Selling</label>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
    <input type="text" name="c1"  class="form-control "  value="{{old('c1')}}"><br>
               
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-images"></i></span>
   </div>                      
  </div>
 </div>
 <span class="text-danger">@error('c1') {{$message}} @enderror</span>
 <label class="text-danger">Category 3  </label>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="c3"  class="form-control "  value="{{old('c3')}}"><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
  <span class="text-danger">@error('c3') {{$message}} @enderror</span>
   <label class="text-danger">Category 4  </label>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">
     <input type="text" name="c4"  class="form-control"  value="{{old('c4')}}">
                 
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>      

 <span class="text-danger">@error('c4') {{$message}} @enderror</span>
 <label class="text-danger">Category 5  </label>
<div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
  
   <input type="text" name="c5"  class="form-control " value="{{old('c5')}}">
 
            
  <div class="input-group-append">
    <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
   </div>                      
  </div>
  <span class="text-danger">@error('c5') {{$message}} @enderror</span> 
 </div>

</div>
<div class="col-md-6">
   <label class="text-danger">Category 2  </label>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
        <input type="text" name="c2" class="form-control" value="{{old('c2')}}">
   
    <div class="input-group-append">
    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
    </div>                      
    </div>
  </div>
 <span class="text-danger">@error('c2') {{$message}} @enderror</span>

<label class="text-danger ">Search tag for Category 3</label>

   <select class="form-control" name="tag3_id"  id="stock_cat">
    <option selected="" disabled hidden="" >Main Category</option>
     @foreach($cat as $m)
      <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
     @endforeach
   </select> 


  <span class="text-danger">@error('tag3') {{$message}} @enderror</span>




<label class="text-danger mt-3">Search tag for Category 4</label>

   <select class="form-control" name="tag4_id"  id="stock_cat2">
    <option selected="" disabled hidden="" >Main Category</option>
     @foreach($cat as $m)
      <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
     @endforeach
   </select> 


  <span class="text-danger">@error('tag4_id') {{$message}} @enderror</span>

<label class="text-danger mt-3">Search tag for Category 5</label>

   <select class="form-control" name="tag5_id"  id="stock_cat3">
    <option selected="" disabled hidden="" >Main Category</option>
     @foreach($cat as $m)
      <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
     @endforeach
   </select> 


  <span class="text-danger">@error('tag3') {{$message}} @enderror</span>
 </div>
 </div>

   
  <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
  </form>
 </div>        
</div>
</div>

 



@endsection