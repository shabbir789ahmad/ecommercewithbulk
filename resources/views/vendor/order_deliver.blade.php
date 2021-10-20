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
     <h4 class="text-center font-weight-bold mt-3 text-color">Delivered Orders</h4>
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


<div class="c mt-3" id="container-wrapper mt-4">


<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th>Price</th>
    <th >Total</th>
    <th >Status</th>
    <th >Quantity</th>
    <th >Order Id</th>
    
    <th class="text-center">Actions</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($order as $show)
   <tr>
    <td class="a col-1"><img src="{{asset('uploads/img/'.$show['image'])}}" width="100%"> </td>
    <td class="a">{{ucfirst($show['product'])}}</td>
    <td class="a">{{ucfirst($show['price'])}}</td>
    <td class="a">{{ucfirst($show['total'])}}</td>
    <td><span class="badge badge-success">{{$show['order_status']}}</span>
      <button class="btn-sm btn btn-dark status"  data-sid="{{$show['id']}}" data-status="{{$show['order_status']}}">change</button>
    </td>

    <td class="a ">{{ucfirst($show['quentity'])}}</td>
    <td class="a ">{{ucfirst($show['order_id'])}}</td>
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
  



  
 @endsection

