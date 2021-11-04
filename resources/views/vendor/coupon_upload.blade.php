@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('vendor/new-coupon')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Upload
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload New Coupon </h4>
   </div>
 </div>

<a href="{{url('vendor/show-coupons')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/show-coupons')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

 
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-2 col-sm-1"></div>
   <div class="col-md-8 card col-sm-10 border border-success mt-5 p-5">
    <form action="{{url('vendor/coupon')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6">
       <label class="mt-2 font-weight-bold">Coupon Code </label>  
       <div class="form-group">
        <div class="input-group clockpicker" id="clockPicker1">
         <input type="text" name="code" placeholder="" class="form-control" value="{{old('code')}}" required="" id="coupon-code">
          <div class="input-group-append">
           <span class="input-group-text add"  id="random"> Genrate</i>
           </span>
          </div>                      
        </div>
       </div>
       <span class="text-danger d-block" >@error('code') {{$message}} @enderror</span>
       <label class="font-weight-bold" >Coupon Value </label>  
       <div class="form-group" >
        <div class="input-group clockpicker" id="clockPicker1">
         <input type="text" name="value" placeholder="200,100 150 etc" class="form-control" value="{{old('value')}}" required>
          <div class="input-group-append">
           <span class="input-group-text">
            <i class="fab fa-product-hunt"></i>
           </span>
          </div>                      
        </div>
       </div>
       <span class="text-danger d-block">@error('value') {{$message}} @enderror</span>
       <label class="font-weight-bold">Coupon type </label>  
       <div class="form-group">
        <div class="input-group clockpicker" id="clockPicker1">
         <select class="form-control" name="type" required="">
           <option disabled selected hidden>Select Type Of coupon</option>
           <option value="%">percentage</option>
           <option value="fixed">Fixed Amount</option>
         </select>
          <div class="input-group-append">
           <span class="input-group-text">
            <i class="fab fa-product-hunt"></i>
           </span>
          </div>                      
        </div>
       </div>
       <span class="text-danger d-block">@error('type') {{$message}} @enderror</span>

      </div>
      <div class="col-md-6">
       <label class="mt-2 font-weight-bold">Coupon Minimum Order Amount </label>  
       <div class="form-group">
        <div class="input-group clockpicker" id="clockPicker1">
         <input type="text" name="min_order_amnt" placeholder="Min Amount of order" class="form-control" value="{{old('min_order_amnt')}}" required="">
          <div class="input-group-append">
           <span class="input-group-text">
            <i class="fab fa-product-hunt"></i>
           </span>
          </div>                      
        </div>
       </div>
       <span class="text-danger">@error('min_order_amnt') {{$message}} @enderror</span>
       <label class="font-weight-bold">Coupon Expiray Date </label> <br> 
        <div class="form-group">
         <div class="input-group clockpicker" id="clockPicker1">
          <input type="datetime-local" name="exp_date" placeholder="Coupon type" class="form-control" value="{{old('exp_date')}}" required="">
           <div class="input-group-append">
            <span class="input-group-text">
             <i class="fab fa-product-hunt"></i>
            </span>
           </div>                      
         </div>
        </div>
        <span class="text-danger">@error('exp_date') {{$message}} @enderror</span>
      </div>
    </div>
   <button  class="btn btn-block btn-color text-light mt-5">Submit</button>
   </form>
          </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div>



 
</div>

@endsection