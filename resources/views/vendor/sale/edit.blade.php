@extends('vendor.master')
@section('content')


<div class="row">
  <div class="col">
   <div class="card card-light">
	 <div class="card-header background_color">
       <h1 class="card-title text-light">Update Sale</h1>
	  </div>
			<!-- /.card-header -->
			<!-- form start -->
	 <form action="{{ route('sales.update',['sale'=>$sale['id']]) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
	 <div class="card-body">
       <div class="form-group row">
		 <div class="col-sm-6 mt-3">
			
			<x-product.input name="sale_name" label="Sale Name " type="text" value="{{$sale['sale_name']}}"></x-product.input>
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="start_time" label="Start Date" type="datetime-local"></x-product.input>
			
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="end_time" label="End Date Date" type="datetime-local"></x-product.input>
		</div>
		<div class="col-sm-6 mt-3">
		 	<x-product.input name="image" label=" Image" type="file"></x-product.input>
		</div>
					
	  </div>
					
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<x-btn.save />
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')


@endsection