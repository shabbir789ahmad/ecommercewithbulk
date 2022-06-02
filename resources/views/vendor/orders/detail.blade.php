@extends('vendor.master')

@section('content')


<div class="container-fluid" id="myDiv">
	<div class="card">
		<div class="card-header backgorund_color2">Invoice
			<button class="btn btn-info btn-xl float-end " id="print_invoice">Print</button></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
          <h4 class="fw-bold">Invoice No#: <span>12</span></h4>
          
          <p class="mb-2"><span class="fw-bold">Store Name:</span> <span>{{Auth::user()->name}}</span></p>
          <p><span class="fw-bold">Store Email:</span> <span>{{Auth::user()->email}}</span></p>
          <p><span class="fw-bold">Store Phone:</span> <span>{{Auth::user()->phone}}</span></p>
				</div>

				<div class="col-md-6">
					
          <h4 >Name: <span class="fw-bold">{{$order->name}}</span></h4>
          <p class="mb-2"><span class="fw-bold">Email:</span> <span>{{$order->email}}</span></p>
          <p class="mb-2"><span class="fw-bold">Phone:</span> <span>{{$order->phone}}</span></p>
          <p><span class="fw-bold">Order Date:</span> <span>{{$order['created_at']}}</span></p>
        

          
				</div>

			</div>

      @if(count($order->orders) > 0)

     
	  <div class="table-responsive ">
		<table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
		  <thead class="table_header rounded backgorund_color2 text-light">
			<tr class="text-center">
				<th scope="col">Image</th>
				<th scope="col"> Name</th>
				<th scope="col">Quentity</th>
				<th scope="col">Size</th>
				<th scope="col">Color</th>
				<th scope="col"> Price</th>
				
			</tr>
		  </thead>
		  <tbody>
		 @foreach($order->orders as $order)
		 <tr class="text-center">
		   
			<td class="col-1"><img src="{{asset('uploads/img/'. $order['image'])}}" width="100%" height="60rem" class="rounded"></td>
			<td class="col-4">{{ $order['product_name'] }}</td>
			<td>{{ $order['quentity'] }}</td>
			<td>{{ $order['size'] }}</td>
			<td>{{ $order['color'] }}</td>
			<td>{{ $order['sub_total'] }}</td>
   
		  </tr>

          @php $total=''; $shipping=$order['ship']; @endphp
          @php $total=$order['sub_total']; @endphp
		 @endforeach
		  </tbody>
		</table>
	 </div>
    @else

    @endif
    <h4  class="text-danger">Payment <span class="fw-bold text-success">@if($order['payment_status']==5) Cash On Delivery @else Paid @endif</span></h4>
    <h4 class="text-danger" >Payment Mode: <span class="fw-bold text-success">@if($order['payment_status']==5)Cash On Delivery @else Paid @endif</span></h4>
    <h4  class="text-danger">Final Total: <span class="fw-bold text-success">{{$total+$shipping}}</span></h4>

    
		</div>
	</div>
</div>


@endsection

@section('js')


@endsection