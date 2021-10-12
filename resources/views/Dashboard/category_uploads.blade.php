@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/get-cat')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Category
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload Menu</h4>
   </div>
 </div>

<a href="{{url('admin/show-category')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/show-category')}}">
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
            
      <form action="{{url('admin/upload-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
   
    <label class="mt-3">Main Category</label>
   
<div class="form-group">
<div class="input-group clockpicker" id="clockPicker1">
  <select class="form-control select"  name="menue_id" required="">
    <option disabled selected hidden> Select Main Category</option>
          @foreach($maincat as $sub)
     <option  value="{{$sub['id']}}">{{ucfirst($sub['category'])}}</option>
     @endforeach
    </select> 
                      
 <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-calendar"></i></span>
 </div>                      
     </div>
     <span class="text-danger mt-3">@error('menue_id') {{$message}} @enderror</span>
</div>
    

    
     <label class="mt-3">Category</label>
   
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="smenue" placeholder="Category" class="form-control "  value="{{old('smenue')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
    <span class="text-danger">@error('smenue') {{$message}} @enderror</span>
  <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
  </form>
          </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div>



 
</div>


@endsection