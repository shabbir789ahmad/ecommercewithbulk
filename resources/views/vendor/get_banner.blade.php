@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('vendor/banner')}}">
    <div class="card shadow border p-0 d-none d-md-block">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Banner
   </div>
 </div>
</a>
<div class="card shadow border ml-auto w-100 w-md-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">All Banner</h4>
   </div>
 </div>
<a href="{{url('vendor/get-banner')}}" class="ml-auto">
   <div class="card shadow border d-none d-md-block p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/get-banner')}}">
 <div class="card shadow d-none d-md-block p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
 
 <div class="container-fluid mt-5">
  <div class="row">
    @foreach($banner as $slid)
     <div class="col-md-6 col-lg-4 col-sm-6 col-12 mt-3">
       <div class="card">
        <img src="{{asset('uploads/img/'.$slid['banner'])}}" width="100%">
        <div class="card-body">
          <p class="text-danger font-weight-bold">{{$slid['heading1']}}</p>
          <p>{{$slid['heading2']}}</p>
        <div class="b d-flex justify-content-center mt-3">
          <button class="btn btn-lg btn-color text-light bann"  data-id="{{$slid['id']}}" data-h1="{{$slid['heading1']}}" data-h2="{{$slid['heading2']}}"> Update
          </button>
    
          <a href="{{'delete-banner/'.$slid['id']}}">  
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


<div class="modal fade" id="banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('vendor/update-banner')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="idb">
        <label>Heading 1</label>
        <input type="text" class="form-control" name="heading1" id="head1">
        <label class="mt-3">Heading 2</label>
        <input type="text" class="form-control" name="heading2" id="head2">
        <label class="mt-3">banner Image</label>
        <input type="file" class="form-control" name="banner" >
   
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Save changes</button>
           </form>
      </div>
    </div>
  </div>
</div>

 @endsection