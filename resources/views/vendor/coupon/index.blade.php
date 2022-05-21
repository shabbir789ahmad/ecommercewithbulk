@extends('vendor.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<a href="{{ route('coupon.create') }}" id="_btnLink" class="btn btn-primary p-2" style="margin-left: 1.5rem;">
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
             All Coupons
	      </div>
	<div class="card-body p-1">
	@if(count($coupons) > 0)
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead class="table_header">
				<tr>
					
					<th scope="col">Coupon</th>
					<th scope="col">Discount</th>
					<th scope="col">Expiry</th>
					<th scope="col">Usage Limit</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			  @foreach($coupons as $coupon)
			   <tr>
				
				  <td class="">{{ $coupon->code}}
				  </td>
				  <td class="">{{ $coupon->value}}
				  </td>
				  <td class="">{{ $coupon->exp_date}}
				  <td class="">{{ $coupon->limit}}
				 
				  <td>
				  	<a href="{{route('coupon.edit',['coupon'=>$coupon['id']])}}" class="btn btn-info btn-xs">Edit</a>
					<form action="{{ route('coupon.destroy', ['coupon' => $coupon->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
					<x-alert.resource-empty resource="Coupon" new="coupon.create"></x-alert.resource-empty>
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