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
	 <form action="{{ route('supplier.update',['supplier'=>$supplier['id']]) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
	 <div class="card-body">
       <div class="form-group row">
		 <div class="col-sm-6 mt-3">
			
			<x-product.input name="supplier_name" label="Supplier Name" type="text" value="{{$supplier['supplier_name']}}"></x-product.input>
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="address" label="Supplier Address " type="text" value="{{$supplier['address']}}"></x-product.input>
			
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="phone" label="Supplier Phone" type="text" value="{{$supplier['phone']}}"></x-product.input>
			
		 </div>
					
	  </div>
					
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