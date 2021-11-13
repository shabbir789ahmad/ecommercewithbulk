@extends('master.master')
@section('content')
 
<div class="container">
  <p class="product-name mt-5 text-center">Login And Securty</p>
   <div class="row">
   	<div class="col-md-2"></div>
   	<div class="col-md-8">
     <div class="card border shadow">
      <div class="card-body">
        <form action="{{url('update-user')}}" method="POST" enctype="multipart/form-data">
        	@csrf
          <input type="hidden" name="id" value="{{$user->id}}">
        	<label class="">Name:</label>
        	<input type="text" name="name" value="{{$user->name}}" class="form-control">
        	<label class="mt-1">Email:</label>
        	<input type="text" name="email" value="{{$user->email}}" class="form-control">
        	<label class="mt-1">Phone:</label>
        	<input type="text" name="phone" value="{{$user->phone}}" class="form-control">
        	<label class="mt-1">Password:</label>
        	<input type="text" name="password" value="{{$user->password}}" class="form-control">
        	<label class="mt-1">Image:</label>
        	<input type="file" name="image" value="{{$user->image}}" class="form-control">
            <img src="{{asset('uploads/img/' .$user->image)}}" alt="profile image" width="20%" height="150rem"><br>
            <button class="btn-block btn btn-check text-light py-3">Update</button>
        </form>
      </div>
     </div>
   	</div>
   	<div class="col-md-2"></div>
   </div>
</div>

@endsection