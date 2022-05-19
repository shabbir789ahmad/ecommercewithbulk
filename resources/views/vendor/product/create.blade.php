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
	 <form action="{{ route('product.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
		@csrf
	 <div class="card-body">
       <div class="form-group row">
		 <div class="col-sm-4">
		    <label class="label_font_size fw-bold">Category</label>
			<select class="form-control input_border_color py-3 category_id" name="quize_id">
			   <option disabled selected hidden>Select Category  </option>
			   @foreach($categories as $category)
				  <option value="{{$category['id']}}">{{$category['category']}}</option>
			   @endforeach
						 
			</select>
		  </div>
		  <div class="col-sm-4">
		    <label class="label_font_size fw-bold">Select Middel Category</label>
			<select class="form-control input_border_color py-3 middel_id" name="middel_id" >
			  
						 
			</select>
		  </div>

		  <div class="col-sm-4">
		    <label class="label_font_size fw-bold">Select Sub Category</label>
			<select class="form-control input_border_color py-3" name="subcategory_id" id="subcategory_id">
			 
						 
			</select>
		  </div>
		
		 <div class="col-sm-6 mt-3">
			
			<x-product.input name="product_name" label="Product Name" type="text"></x-product.input>
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="price" label="Product Price" type="text"></x-product.input>
			
		 </div>
		 <div class="col-sm-12 mt-3">
			<label class="label_font_size fw-bold">Product Detail</label>
			<textarea class="form-group input_border_color form-control" name="detail"></textarea>
		 </div>
          
          <div class="col-sm-6 mt-3">
		    <label class="label_font_size fw-bold">Select Brand</label>
			<select class="form-control input_border_color py-3 " name="brand[]">
			   <option disabled selected hidden>Select Brand  </option>
			   @foreach($brands as $brand)
				  <option >{{$brand['bname']}}</option>
			   @endforeach
						 
			</select>
		  </div>
		 <div class="col-sm-6 mt-3">
			
			<x-product.input name="discount_price" label="Product Discounted Price" type="text"></x-product.input>
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="shipping_cost" label="Product shipping Cost" type="text"></x-product.input>
			
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="size[]" label="Product Size" type="text"></x-product.input>
			
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="stock" label="Product stock" type="text"></x-product.input>
			
		 </div>
		 <div class="col-sm-6 mt-3">
		 	<x-product.input name="color[]" label="Product Color" type="text"></x-product.input>
			
		 </div>
          
          
             
		 <div class="col-sm-6 mt-3">
		  
		  <label for="" class="fw-bold  label_font_size">
                Select Multiple Images <span class="text-danger">*</span>
             </label>
		  <input class='form-control input_border_color  py-3' name="images[]" type='file' multiple/>

         @error('images') <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}</div> @enderror
			
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