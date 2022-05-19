@extends('vendor.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<a href="{{ route('supplier.create') }}" id="_btnLink" class="btn btn-primary p-2" style="margin-left: 1.5rem;">
             <i class="fa fa-fw fa-plus-circle"></i>
              Create
               </a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
		  <div class="card-header background_color">
             All Supplier
	      </div>
	<div class="card-body p-1">
	@if(count($suppliers) > 0)
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead class="table_header">
				<tr>
					
					<th scope="col"> Name</th>
					<th scope="col">Address</th>
					<th scope="col">Phone</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			  @foreach($suppliers as $supplier)
			   <tr>
				
				  <td class="">{{ $supplier->supplier_name}}
				  </td>
				  <td class="">{{ $supplier->address}}
				  </td>
				  <td class="">{{ $supplier->phone}}
				 
				  <td>
				  	<a href="{{route('supplier.edit',['supplier'=>$supplier['id']])}}" class="btn btn-info btn-xs">Edit</a>
					<form action="{{ route('supplier.destroy', ['supplier' => $supplier->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
					<x-alert.resource-empty resource="Supplier" new="supplier.create"></x-alert.resource-empty>
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