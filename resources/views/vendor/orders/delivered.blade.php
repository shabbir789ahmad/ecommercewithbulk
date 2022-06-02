@extends('vendor.master')
@section('content')

<div class="row">
 <div class="col-12">
  <div class="card">
  	<div class="card-header backgorund_color2 mx-1">
        All Orders
	</div>
	
	<div class="card-body  p-1">
	@if(count($orders) > 0)
	  <div class="table-responsive ">
		<table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
		  <thead class="table_header rounded">
			<tr>
				<th scope="col">Image</th>
				<th scope="col">User Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone</th>
				<th scope="col">Quentity</th>
				<th scope="col"> Price</th>
				<th scope="col"> Delivered Date</th>
		
				<th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		 @foreach($orders as $order)
		 <tr>
		   
			<td class="col-1"><img src="{{asset('uploads/img/'. $order['image'])}}" width="100%" height="60rem" class="rounded"></td>
			<td>{{ $order['name'] }}</td>
			<td>{{ $order['email'] }}</td>
			<td>{{ $order['phone'] }}</td>
			<td>{{ $order['quentity'] }}</td>
			<td>{{ $order['total'] }}</td>
			<td >{{$order['updated_at']}}</td>
     <td><a href="{{ route('orders.detail.vendor', ['id' => $order->order_id]) }}" class="btn btn-xs  btn-info">Detail</a></td>
			
		  </tr>
		 @endforeach
		  </tbody>
		</table>
	 </div>
	@else
		<x-alert.resource-empty resource="Product" new="orders.for.vendor"></x-alert.resource-empty>
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