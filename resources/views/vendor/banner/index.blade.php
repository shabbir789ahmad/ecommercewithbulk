@extends('vendor.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<a href="{{ route('banner.create') }}" id="_btnLink" class="btn btn-primary p-2" style="margin-left: 1.5rem;">
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
             All Banner
	      </div>
	<div class="card-body p-1">
	@if(count($banners) > 0)
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead class="table_header">
				<tr>
					
					<th scope="col"> Banner</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			  @foreach($banners as $banner)
			   <tr>
				
				  <td class="col-2"><img src="{{asset('uploads/img/'.$banner['banner'])}}" width="100%"></td>
				  <td class="col-8"></td>
				  <td>
				  	<a href="{{route('banner.edit',['banner'=>$banner['id']])}}" class="btn btn-info btn-xs">Edit</a>
					<form action="{{ route('banner.destroy', ['banner' => $banner->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
					<x-alert.resource-empty resource="Banner" new="banner.create"></x-alert.resource-empty>
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