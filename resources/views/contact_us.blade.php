@extends('master.master')
@section('content')

<div class="container mt-3 ">
<div class="row"  style="width1:100%">
  <div class="col-md-6">
   <div class="backgorund_image" style="background-image: url('pic/bg-01.jpg');    ">
     
   </div>
   <div class=contact_info>
     <div class="  row">
       <div class="col-md-3">
         
       </div>
       <div class="col-md-8">
           
           <p class=" font-weight-bold text-center mt-5"><i class="fas fa-map-marker-alt fa-lg text-light"></i> Address Info</p>
          <p class=" text-center" style="color:#999999">Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US</p>

          <p class=" font-weight-bold text-center mt-5"><i class="fas fa-envelope fa-lg " ></i> Address Info</p>
          <p class="prom2 text-center text-danger">info@wasisoft.gmail.com</p>

           <p class=" font-weight-bold text-center mt-5"><i class="fas fa-phone fa-lg text-light"></i> Lets Talk</p>
          <p class=" mb-0 prom2 text-center text-danger">+343-4753450</p>
          <p class="prom2 text-center text-danger">+343 -4753459</p>

           


       </div>
     </div>
     </div>
  </div>

  <div class="col-md-6 ">
	<h2 class="get text-center  mt-5 ">Send Us A Message</h2>
		<p class="prom text-center">Your email address will not be published. We promise not to spam!</p>

   <div class="form ">
   <form action="{{route('contact.store')}}" method="POST">
   	@csrf
   	<input type="text" name="name" class="form-control py-4 input_style" placeholder="FULL NAME">
    <span class="text-danger">@error('name') {{@message}} @enderror </span>
    <br>
    <input type="text" name="email" class="form-control py-4 mt-2 input_style" placeholder=" Email Address"> 
    <span class="text-danger">@error('email') {{@message}} @enderror </span><br>
    <input type="text" name="phone" class="form-control py-4 mt-2 input_style" placeholder="Phone Number">
    <span class="text-danger">@error('phone') {{@message}} @enderror </span><br>
<textarea cols="12" rows="5" name="message" class="mt-3  form-control mb-5 input_style" placeholder="Your Message"></textarea>
    <span class="text-danger">@error('message') {{@message}} @enderror</span>

    <button class="btn btn-block btn-check text-light rounded py-3 mt-5 pt-3  mb-5">SUBMIT</button>
   </form>

   </div>
</div>


    </div>

	</div>
</div>
</div>
@endsection