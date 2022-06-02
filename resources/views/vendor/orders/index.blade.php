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
				<th scope="col">Quentity</th>
				<th scope="col"> Price</th>
				<th scope="col"> Status</th>
				<th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		 @foreach($orders as $order)
		 <tr>
		   
			<td class="col-1"><img src="{{asset('uploads/img/'. $order['image'])}}" width="100%" height="60rem" class="rounded"></td>
			<td>{{ $order['name'] }}</td>
			<td>{{ $order['quentity'] }}</td>
			<td>{{ $order['total'] }}</td>
			<td class="col-1"><button type="button" class="btn  @if($order['order_status']=='Recieved') btn-success @elseif($order['order_status']=='Shipped') btn-info @elseif($order['order_status']=='Pending') btn-danger @elseif($order['order_status']=='Enroute') btn-warning @endif  Pending  btn-xs changeOrderStatus" data-id="{{$order['order_id']}}">{{$order['order_status']}}</button></td>

			<td class="col-2">
				<a href="{{ route('orders.detail.vendor', ['id' => $order->order_id]) }}" class="btn btn-xs  btn-info">Detail</a>
				
				<form action="{{ route('orders.delete.vendor', ['id' => $order->order_id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
		<x-alert.resource-empty resource="Product" new="orders.for.vendor"></x-alert.resource-empty>
	@endif			
   </div>
  </div>
 </div>
</div>



<!-- change orde status  -->
<div class="modal fade" id="orderStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="{{route('change.order.status')}}" method="POST">
      		@csrf
      		@method('PATCH')
      	<input type="hidden" name="id" id="order_id">
      	<label class="fw-bold">Change Order Status</label>
        <select class="form-control mt-2" name="order_status">
        	<option>Recieved</option>
        	<option>Shipped</option>
        	<option>Pending</option>
        	<option>Enroute</option>
        	<option>Delivered</option>
        </select>
      </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
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
<script type="text/javascript">
	
	 $(document).on('click','.changeOrderStatus',function()
	 {
         $('#order_id').val($(this).data('id'));
         $('#orderStatusModal').modal('show');
    });

</script>
@endsection