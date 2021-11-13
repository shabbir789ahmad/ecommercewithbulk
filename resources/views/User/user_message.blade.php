@extends('master.master')
@section('content')

 <div class="container">
 	<p class="product-name mt-5">Your Messages</p>
  <div class="row">
  	<div class="col-md-3 border">
  		fgh
    </div>
    <div class="col-md-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
       <li class="nav-item">
         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">message</a>
       </li>
       <li class="nav-item ml-0 pl-0">
         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
       </li>
      </ul>
      <div class="tab-content" id="myTabContent">
       <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
       <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
       <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>
     </div>
  </div>
</div>


@endsection