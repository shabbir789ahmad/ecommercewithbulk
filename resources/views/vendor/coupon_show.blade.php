@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">
<div class="card shadow d-flex border  p-0 ">
  
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('vendor/new-coupon')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
      
     <h4 class="text-center font-weight-bold mt-3 text-color">All Coupons</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/show-coupons')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/new-coupons')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>



<div class="c mt-3" id="container-wrapper mt-4">
 
<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4">
  <div class="table-responsive p-3">
    <button class="btn btn-color text-light" id="cop">delete</button>
    <table class="table align-items-center table-flush" id="dataTable">
     <thead class="thead-light">
       <tr>
        <th><input type="checkbox" name="" id="check"></th>
        <th>Coupon </th>
        <th>Value</th>
        <th >Type</th>
        <th class="col-2">Min Amount</th>
        <th >Expiry Date</th>
        <th class="col-1">Status</th>
        <th class="text-center">Actions</th>
        </tr>
      </thead>
                    
   <tbody>
   @foreach($coupon as $show)
   <tr>
    <td><input type="checkbox" name="id" class="check" value="{{$show['id']}}"></td>
    <td class="a col-1"> {{$show['code']}}</td>
    <td class="a">{{$show['value']}}</td>
    <td class="a">{{$show['type']}}</td>
    <td class="a">{{$show['min_order_amnt']}}</td>
    <td class="col-2"><span class="badge badge-success">{{$show['exp_date']}}</span></td>
    <td class="a " ><input type="checkbox" data-id="{{ $show['id'] }}" name="coupon_status" class="js-switchcp" 
     {{ $show->coupon_status == 1 ? 'checked' : '' }} ></td>
    
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="javascript:void(0)" class="border shadow  py-2 px-3 coupon" data-id="{{$show['id']}}" data-value="{{$show['value']}}" data-min="{{$show['min_order_amnt']}}" data-exp="{{$show['exp_date']}}"><i class="fas fa-eye text-success"></i>
       </a>
       <a href="{{'delete-coupon/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"></i>
       </a>
      </div> 
    </td>
   </tr>
 
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $coupon->links() }}
  </div>
  </div>
</div>
</div>
  


<div class="modal fade" id="modal-coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Coupon Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/coupon-update')}}" method="GET">
      <input type="hidden" name="id" id="id">      
      <label>New Coupon Price</label>
      <input type="text" class="form-control" name="value" id="valu">
      <label>New Minimum Order Price</label>
      <input type="text" class="form-control" name="min_order_amnt" id="min_amnt"> 
      <label>New Coupon Expiry Date</label>     
      <input type="datetime-local" class="form-control" name="exp_date" required>
      <p id="exp_dat" class="text-danger"></p>
      <button class="btn btn-color text-light  float-right mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>

<form id="order_form">
  <input type="hidden" name="counte" id="order_counte">
</form>
 @endsection

