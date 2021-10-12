@extends('master.master')
@section('content')

<div class="container-fluid">
<div class="row">
	<div class="col-md-6 ">
		<h4 class="get text-center font-weight-bold ">Get in Touch</h4>
		<p class="prom text-center">Your email address will not be published. We promise not to spam!</p>

   <div class="form ">
   <form action="{{url('contact2')}}" method="POST">
   	@csrf
   	<input type="text" name="name" class="form-control py-3" placeholder="FULL NAME">
    <span class="text-danger">@error('name') {{@message}} @enderror </span>
    <br>
    <input type="text" name="email" class="form-control py-3 mt-3" placeholder=" Email Address"> 
    <span class="text-danger">@error('email') {{@message}} @enderror </span><br>
    <input type="text" name="phone" class="form-control py-3 mt-3" placeholder="Phone Number">
    <span class="text-danger">@error('phone') {{@message}} @enderror </span><br>
<textarea cols="12" rows="5" name="message" class="mt-3  form-control" placeholder="Your Message"></textarea>
    <span class="text-danger">@error('message') {{@message}} @enderror</span>
    <button class="btn btn-block btn-check text-light rounded py-3 mt-5 s mb-5">SUBMIT</button>
   </form>

   </div>
</div>

<div class="col-md-6 ">
   <p class="get2 font-weight-bold text-center">Contact Info</p>
		<p class="prom2 text-center">Your email address will not be published. We promise not to spam!</p>

      <hr class="mt-3 w-100">
      <div class="row">
      	<div class="col-md-2 col-2">
      		 <i class="fas fa-phone fa-3x text-dark mt-4 ml-3"></i>
      	</div>
      	<div class="col-md-10 col-10 ">
           <p class="phone ml-3">345-345-6556</p>
       
      	</div>
      </div>
      <hr class="mt-2 w-100">
      <div class="row">
      	<div class="col-md-2 col-2">
      		 <i class="fas fa-envelope fa-3x text-dark mt-4 ml-3" ></i>
      	</div>
      	<div class="col-md-10 col-10 ">
           <p class="phone ">test788test@gmail.com</p>
       
      	</div>
      </div>
      <hr class="mt-2 w-100">
      <div class="row mb-4">
      	<div class="col-md-2 col-2">
      		 <i class="fas fa-map-marker-alt fa-3x text-dark mt-4 ml-3"></i>
      	</div>
      	<div class="col-md-10 col-10 ">
           <p class="phone ">248 Hedge St, NJ 07201</p>
       
      	</div>
      </div>
    </div>

	</div>
</div>
</div>
@endsection