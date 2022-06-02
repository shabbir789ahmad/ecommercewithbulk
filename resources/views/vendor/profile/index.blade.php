@extends('vendor.master')

@section('content')
<style type="text/css">
	.text_color{
		color: #565959;
		font-size: 1vw;
	}
	
</style>
<div class="row ml-4 justify-content-center">
	<div class="col-6">
		<div class="form-group mt-5 mb-3 ">
			<h1 class="fw-bold">Manage Your Profile</h1>
		</div>
		<div class="card border">
		  <div class="card-body ">
            <h2 class="fw-bold mt-4" >{{Auth::user()->name}} <i class="fa-solid fa-pen fa-xs " id="update_name"></i></h2>
            <p class="fw-bold">Acount Holder</p>
		  </div>
		</div>

		<div class="card border">
		  <div class="card-body ">
            <h4 class="fw-bold ">Contact Details<h4>
            <p class="text_color mt-3">Receive important alerts for your profile here.</p>

            <h6 class="fw-bold ">Mobile Number <i class="fa-solid fa-pen fa-md float-end" id="update_phone"></i><h6>
            <p class="text_color mt-3">{{Auth::user()->phone}}</p>
		  </div>
		</div>

		<div class="card border ">
		  <div class="card-body ">
            <h4 class="fw-bold ">Contact Details<h4>
            <p class="text_color mt-3">Receive important alerts for your profile here.</p>

            <h6 class="fw-bold ">Email <i class="fa-solid fa-pen fa-md float-end" id="update_email"></i><h6>
            <p class="text_color mt-3">{{Auth::user()->email}}</p>
		  </div>
		</div>

		

	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('profile.update',['profile'=>Auth::id()])}}" method="POST">
        	@csrf
        	@method('PUT')
        	<div id="name" >
              <x-product.input name="name" label="Update Name" type="text" value="{{Auth::user()->name}}"></x-product.input>
          </div>

          <div id="phone" >
         <x-product.input name="phone" label="Update Phone" type="text" value="{{Auth::user()->phone}}" ></x-product.input>
         </div>
         <div id="email" >
            <x-product.input name="email" label="Update Email" type="text" value="{{Auth::user()->email}}" ></x-product.input>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	
	

	$('#update_name').click(function(){
      
       $('#exampleModal').modal('show');
       $('#name').css('display','block')
       $('#email').css('display','none')
       $('#phone').css('display','none')
	});

	$('#update_phone').click(function(){
      
       $('#exampleModal').modal('show');
       $('#phone').css('display','block');
       $('#name').css('display','none');
       $('#email').css('display','none');
	});

	$('#update_email').click(function(){
      
       $('#exampleModal').modal('show');
       $('#email').css('display','block')
       $('#phone').css('display','none')
       $('#name').css('display','none')

	});
</script>
@endsection

