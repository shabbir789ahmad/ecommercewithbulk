@extends('master.master')
@section('content')
 
 <div class="container">
  <div class="row ">
  	<div class="col-md-1"></div>
  	<div class="col-md-10 border">
  	 <div class="banner-user">
       @forelse($cover as $cov)
         <img src="{{asset('uploads/img/' .$cov['cover_image'])}}" alt="profile image" width="100%" class="round-image2">
       @empty
  	   <img src="{{asset('pic/default.png')}}" alt="profile image" width="100%" class="round-image2">
       @endforelse
       @if(!auth::user()->image)
  	   <img src="{{asset('pic/default._CR0,0,1024,1024_SX460_.jpg')}}" alt="profile image" width="15%" class="round-image">
       @else
        <img src="{{asset('uploads/img/' .$user->image)}}" alt="profile image" width="15%" height="140rem" class="round-image">
       @endif

       <img src="{{asset('pic/camera.png')}}" width="5%" class="user-camera" data-toggle="modal" data-target="#exampleModal">
       <img src="{{asset('pic/editpencil.png')}}" width="2%" class="user-editpencil">
       <p class="user-name">{{ucwords($user->name)}}</p>
       <p class="user-country">Pakistan</p>
  	 </div>
     <button class="user-edit mb-3 btn btn-check btn-lg float-right"><a href="{{url('login-and-securty')}}" class="text-light">Edit Your Profile</a></button>
    </div>
    <div class="col-md-1"></div>
  </div>
  
  @if ($alert = Session::get('cover'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
   @endif
  <div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-4">
     <div class="card user-card-hover shadow">
      <div class="card-body">
       <p class="about-user1">About <span class="float-right"><button class="btn btn-check text-light" data-toggle="modal" data-target="#aboutModal">add</button></span></p>
       <p class="about-user">{{$about->about}}</p>
      </div>
     </div>
     <div class="card mt-2 user-card-hover shadow">
      <div class="card-body">
       <p class="about-user1">Shopping lists and wish lists</p>
       <p class="about-user">Create multiple lists for yourself and others</p>
      </div>
     </div>
     <div class="card mt-2 user-card-hover shadow">
      <div class="card-body">
       <p class="about-user1">Account</p>
       <a href="{{url('account')}}"><p class="about-user">Check orders, add payments options, manage your password and more</p></a>

      </div>
     </div>
    </div>
    <div class="col-md-6">
     <div class="card mt-2 border user-card-hover shadow">
      <div class="card-body">
       <p class="about-user1">Insights</p>
        <div class="d-flex">
          <div class="insight ml-2">
            <p class="mb-0 text-center">0</p>
            <p>Review</p>
          </div>
          <div class="insight ml-2">
            <p class="mb-0 text-center">0</p>
            <p>Review</p>
          </div>
          <div class="insight ml-2">
            <p class="mb-0 text-center">0</p>
            <p>Review</p>
          </div>
        </div>
      </div>
     </div>
     <div class="card mt-2 user-card-hover shadow">
      <div class="card-body">
       <p class="about-user1">Community activity</p>
  
      </div>
     </div>
    </div>
    <div class="col-md-1"></div>
   </div>
 </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Cover Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('cover-image')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="image" class="form-control" accept="image/*">
          <button  class="btn btn-check text-light float-right mt-4">Save</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<!--about Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Somthing About Yourself</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('about-user')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <textarea class="form-control" name="about" rows="4" cols="12" placeholder="something about yourself....."></textarea>
          <button  class="btn btn-check text-light float-right mt-4">Save</button>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection