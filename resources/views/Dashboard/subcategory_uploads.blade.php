@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/get-sub-category')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Sub Category 
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload Sub Category</h4>
   </div>
 </div>

<a href="{{url('admin/show-sub-category')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update 
   </div>
 </div>
</a>
<a href="{{url('admin/show-sub-category')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete 
   </div>
 </div>
</a>
</div>

 
<div class="container-fluid">
 <div class="card mt-2">
  <div class="card-body shadow">
   <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
<div class="col-md-8  col-sm-10  mt-3 p-3">
   <form action="{{url('admin/upload-sub-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
   
 
   <div class="form-group">
    <div class="input-group clockpicker" id="clockPicker1">
     <select class="form-control select" id="main" name="category_id" required="">
      <option disabled selected hidden> Select Main Category
      </option>
      @foreach($cat as $key => $s)
       <option  value="{{$key}}">{{ucfirst($s)}}</option>
      @endforeach
     </select> 
                      
     <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
     </div>                      
    </div>
   </div>
  <span class="text-danger">@error('category_id') {{$message}} @enderror</span>



   <div class="form-group">
      <div class="input-group clockpicker" id="clockPicker1">
       <select class="form-control " id="sub" name="dropdown_id" required="">
        <option disabled selected hidden> Select Main Category
        </option>
       </select> 
                      
      <div class="input-group-append">
       <span class="input-group-text"><i class="fas fa-calendar"></i></span>
      </div>                      
     </div>
   </div>
   <span class="text-danger">@error('dropdown_id') {{$message}} @enderror</span>
    

   
    <div class="form-group">
     <div class="input-group clockpicker" id="clockPicker1">   
      <input type="text" name="name" placeholder="Sub Category" class="form-control "  value="{{old('name')}}" required=""><br>
              
       <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>                      
     </div>
    </div>
    <span class="text-danger">@error('name') {{$message}} @enderror</span>

    <div class="form-group">
     <div class="input-group clockpicker" id="clockPicker1">   
      <input type="file" name="drop_image" placeholder="Product image Height" class="form-control "  value="{{old('drop_image')}}" required=""><br>
      <div class="input-group-append">
       <span class="input-group-text"><i class="fas fa-tag"></i></span>
      </div>                      
     </div>
    </div>
    <span class="text-danger">@error('drop_image') {{$message}} @enderror</span>
  <label class="text-danger">The Width and height of the Image Should be same</label>
  <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
  </form>
       </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div> 
     </div>
</div>



@endsection