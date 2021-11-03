@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('vendor/all-sale')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Sell
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Make Sell</h4>
   </div>
 </div>
<a href="{{url('vendor/all-sale')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/all-sale')}}">
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
     <form action="{{url('vendor/make-new-sale')}}" method="POST" >
      @csrf
       <label class="text-dark">Sale Name</label> 
       <div class="form-group">
        <div class="input-group clockpicker" id="clockPicker1">  <input type="text" name="sale_name" placeholder="Sale Name" class="form-control"  value="{{old('sell_name')}}" required="">
         <br>
        <div class="input-group-append">
         <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
      </div>
     </div>
     <span class="text-danger ">@error('start_time') {{$message}} @enderror</span><br>
     <label class="text-dark">Sale Start Time</label> 
     <div class="form-group">
      <div class="input-group clockpicker" id="clockPicker1">  
       <input type="datetime-local" name="sale_start" placeholder="Sell End Time" class="form-control "  value="{{old('start_time')}}" required="">
       <br>
       <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
      </div>
     </div>
     <span class="text-danger ">@error('start_time') {{$message}} @enderror</span><br>
    
     <label class="text-dark">Sale End Time</label> 
     <div class="form-group">
      <div class="input-group clockpicker" id="clockPicker1">  
       <input type="datetime-local" name="sale_end" placeholder="Sell End Time" class="form-control "  value="{{old('end_time')}}" required="">
       <br>
       <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-images"></i></span>
       </div>                      
      </div>
     </div>
     <span class="text-danger ">@error('end_time') {{$message}} @enderror</span>
    <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
    </form>
   </div>
   <div class="col-md-2 col-sm-1">
         
   </div>
  </div>
</div>




@endsection