@extends('vendor.master')

@section('content')


<div class="row">
  <div class="col">
   <div class="card card-light">
	 <div class="card-header background_color">
       <h1 class="card-title text-light">Create Store Banner</h1>
	  </div>
			<!-- /.card-header -->
			<!-- form start -->
	 <form action="{{ route('banner.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
	 <div class="card-body">
       <div class="form-group row">
		 <div class="col-sm-6 mt-3">
			
			<x-product.input name="image" label="Store Banner " type="file"></x-product.input>
		 </div>
		 					
	  </div>
					
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-info">Save</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')


@endsection