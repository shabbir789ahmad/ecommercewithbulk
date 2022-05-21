@extends('vendor.master')

@section('content')


<div class="row">
  <div class="col">
   <div class="card card-light">
	 <div class="card-header background_color">
       <h1 class="card-title text-light">Add Question</h1>
	  </div>
			<!-- /.card-header -->
			<!-- form start -->
	 <form action="{{ route('banner.update',['banner'=>$banner['id']]) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
	 <div class="card-body">
     <div class="form-group row">
		  <div class="col-sm-6 mt-3">
			  <x-product.input name="image" label="Store Banner" type="file" ></x-product.input>
		  </div>
     </div>
			 <img src="{{asset('uploads/img/'.$banner['banner'])}}" width="200rem" height="100rem" class="mt-3" >		
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-info">Update</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')


@endsection