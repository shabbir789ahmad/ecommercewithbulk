@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/slider')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Slider
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">All Slider</h4>
   </div>
 </div>
<a href="{{url('admin/get-slider')}}" class="ml-auto">
   <div class="card shadow border  p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/get-slider')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
 
 <div class="container-fluid mt-5">
  <div class="row">
      @foreach($slider as $slid)
   
      <div class="col-md-4 col-sm-4 col-12 mt-3">
       <div class="card">
          <div class="card-body">
            <img src="{{asset('uploads/img/'.$slid['image'])}}" width="100%">
        
          <div class="b d-flex justify-content-center mt-3">
       <a href="{{'update-slider/'.$slid['id']}}">
           <button class="btn btn-lg btn-color text-light"> Update
           </button>
        </a>
       <a href="{{'delete-slider/'.$slid['id']}}">  
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