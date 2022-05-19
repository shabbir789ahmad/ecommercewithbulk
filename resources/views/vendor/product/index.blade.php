@extends('vendor.master')
@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<a href="{{ route('product.create') }}" id="_btnLink" class="btn btn-primary p-2" style="margin-left: 1.5rem;">
             <i class="fa fa-fw fa-plus-circle"></i>
              Create
               </a>
		</div>
	</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
  	<div class="card-header background_color mx-1">
        All Question
	</div>
	
	<div class="card-body  p-1">
	@if(count($products) > 0)
	  <div class="table-responsive ">
		<table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
		  <thead class="table_header rounded">
			<tr>
				<th scope="col">Image</th>
				<th scope="col"> Name</th>
				<th scope="col">Price</th>
				<th scope="col">Discount Price</th>
				<th scope="col">Stock</th>
				<th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		 @foreach($products as $product)
		 <tr>
		   
			<td class="col-1"><img src="{{asset('uploads/img/'. $product->image['product_image'])}}" width="100%" height="60rem" class="rounded"></td>
			<td>{{ $product->product_name }}</td>
			<td>{{ $product->stocks['price'] }}</td>
			<td>{{ $product->stocks['discount_price'] }}</td>
			<td>{{ $product->stocks['stock'] }}</td>

			<td class="col-2">
				<a href="#" class="btn btn-xs btn-danger">Edit</a>
				<form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-xs btn-danger">
						Delete
					</button>
				</form>
			</td>
		  </tr>
		 @endforeach
		  </tbody>
		</table>
	 </div>
	@else
		<x-alert.resource-empty resource="Product" new="product.create"></x-alert.resource-empty>
	@endif			
   </div>
  </div>
 </div>
</div>

@endsection

@section('script')

@parent

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
});
</script>
@endsection