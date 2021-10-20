@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('vendor/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">All Orders</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/orders')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/orders')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>
<div class="row mt-2">
  <div class="col-md-3">
    <div class="card">
      <p class="card-header  text-light font-weight-bold">Today Orders</p>
      <div class="card-body">
        <h3 class="text-center font-weight-bold">{{$today}}</h3>
      </div>
    </div>
  </div>
  <div class="col-md-3 ">
    <div class="card card-border">
      <p class="card-header  text-light font-weight-bold">Pending Orders</p>
     
      <div class="card-body">
        <h3 class="text-center font-weight-bold">{{$pending}}
         
        </h3>
      </div>
        
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <p class="card-header text-light font-weight-bold" style="background-color:#1A8E76;">Orders This Month</p>
      <div class="card-body">
        <h3 class="text-center font-weight-bold">{{$this_month}}</h3>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <p class="card-header  text-light font-weight-bold">Canceled Orders</p>
      <div class="card-body">
        <h3 class="text-center font-weight-bold">{{$cancel}}</h3>
      </div>
    </div>
  </div>

</div>


<div class="c mt-3" id="container-wrapper mt-4">

<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4">
    
    <div class="row mt-4">
     <div class="col-md-3">
      <select class="form-control" id="main-order">
        <option selected disabled hidden="">Select Main Category</option>
        @foreach($cat as $key=> $c)
        <option value="{{$c['id']}}">{{ucfirst($c['category'])}}</option>
        @endforeach
      </select>
     </div>
     <div class="col-md-3">
       <select id="sub-order" class="form-control" >
         
       </select>
     </div>
     <div class="col-md-3">
      <select class="form-control" id="status_search">
        <option selected hidden disabled="">Search By Status</option>
        <option>Pending</option>
        <option>Shipped</option>
        <option>Enroute</option>
      </select>
     </div>
     <div class="col-md-3">
       <form class="d-flex">
       <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-color text-light mr-2" type="button">Search</button>
  </div>
</div>
</form>
     </div>
    </div>
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th >Total</th>
    <th class="col-2">Status</th>
    <th >Payment</th>
    <th class="col-1">Quantity</th>
    <th class="col-1">Order Id</th>
    
    <th class="text-center">Actions</th>
    </tr>
    </thead>
                    
   <tbody>
    @php // dd($order); exit(0); @endphp
   @foreach($order as $show)
   <tr>
    <td class="a col-1"><img src="{{asset('uploads/img/'.$show['image'])}}" width="100%"> </td>
    <td class="a">{{ucfirst($show['product'])}}</td>
    <td class="a">{{ucfirst($show['price'])}}</td>
    <td class="a">{{ucfirst($show['total'])}}</td>
    <td class="col-2"><span class="badge badge-success">{{$show['order_status']}}</span>
      <button class="btn-sm btn btn-dark status"  data-sid="{{$show['id']}}" data-status="{{$show['order_status']}}">change</button>
    </td>

    <td class="a "><span class="badge badge-danger">{{$show['payment']}}</span></td>
    <td class="a col-1">{{ucfirst($show['quentity'])}}</td>
    <td class="a ">{{ucfirst($show['id'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'show-order/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i>
       </a>
       <a href="{{'cancel-order/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"></i>
       </a>
      </div> 
    </td>
   </tr>
 
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $order->links() }}
  </div>
  </div>
</div>
</div>
  

<form id="drop_form">
  <input type="hidden" name="drop" id="drop">
</form>
<form id="status_form">
  <input type="hidden" name="status" id="status">
</form>


<div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/status-up')}}" method="POST">
          @csrf
      <input type="text" name="order_id" id="ids">
      <select class="form-control" id="status" name="order_status">
        <option>Pending</option>
        <option>Shipped</option>
        <option>Enroute</option>
        <option>Delivered</option>
      </select>
      
      <button class="btn btn-color text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>

 @endsection

