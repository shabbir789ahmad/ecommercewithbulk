@extends('vendor.dashboard')
@section('content')

<div class="b p-5 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('vendor/brand')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Upload 
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Delete or Update Brands</h4>
   </div>
 </div>
<a href="{{url('vendor/get-brand')}}" class="ml-auto">
   <div class="card shadow border  p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-sm"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/get-brand')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-sm"></i> Delete
   </div>
 </div>
</a>
</div>
 
 <div class="container-fluid mt-5">
  <div class="row">
      @foreach($brand as $slid)
   
      <div class="col-md-4 col-sm-4 col-12 mt-3">
       <div class="card">
          <div class="card-body">
            <h4 class="h4 text-center">{{ucwords($slid['bname'])}}</h4>
        
          <div class="b d-flex justify-content-center mt-3">
       <a href="{{'update-brand/'.$slid['id']}}">
           <button class="btn btn-lg btn-color text-light"> Update
           </button>
        </a>
       <a href="{{'delete-brand/'.$slid['id']}}">  
         <button class="btn btn-lg btn-danger ml-3" onclick="return confirm('Are you sure?')"> Delete
         </button>
       </a>
           
           </div>
          </div>
       </div>

    </div>
 
@endforeach
</div>

 </div>

 </div>

 @endsection