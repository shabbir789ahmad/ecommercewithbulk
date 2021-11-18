@extends('vendor.dashboard')
@section('content')
<div class="container-fluid " >
 <div class="row ml-2 mr-2">
  @foreach($deal as $sale)
  <div class="col-md-4 col-12">
   <div class="card shadow" style="width: 100%; height:25rem">
     <p class="order-user ml-3 mt-3 text-color font-weight-bold">{{ucwords($sale['deal_name'])}}</p>
    <div class="row ">
     <div class="col-md-12 col-12">
       <a href="{{url('vendor/deal-detail/' .$sale['id'])}}">
       <img src="{{asset('uploads/img/' .$sale['deal_image'])}}" width="90%" height="215rem" class="ml-3">
       <p class="product-detail3 ml-3 mt-3">{{$sale['deal_price']}}</p></a> 
       <h1 class="product-detail3 ml-3 mb-0 mt-3" style="font-size: 1.2rem">Rs. {{$sale->sell_price - $sale->discount}}
          <span class="text-danger"><small><del>{{$sale->sell_price}}</del></small></span></h1>
     </div>
    </div>
    <div class="button d-flex justify-content-center mt-3">
     <button class="btn-color btn text-light btn-lg deal" data-id="{{$sale['id']}}" data-name="{{$sale['deal_name']}}" data-detail="{{$sale['deal_detail']}}" data-image="{{asset('uploads/img/'.$sale['deal_image'])}}">Update</button>
     <a href="{{url('vendor/deal-detail/' .$sale['id'])}}">
     <button class="btn-color btn text-light btn-lg ml-2">Detail</button></a>
   </div>
   </div>
  </div>
  @endforeach
 </div>
</div>



<!--add deal product Modal -->
<div class="modal fade" id="dealupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Deal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{url('vendor/update-deal')}}" method="POST" enctype="multipart/form-data">
           @csrf
           <input type="text" name="id" id="did">
           <label class="font-weight-bold">New Deal Name</label>
           <input type="text" name="deal_name" id="dname"  class="form-control">
           
           <label class="mt-1 font-weight-bold">New Deal End Time</label>
            <input type="datetime-local" name="deal_end_date"  class="form-control">
            <label class="mt-1 font-weight-bold">New Deal Image</label>
            <input type="file" name="image" class="form-control">
            <img src="" id="dimage" width="20%" class="mt-2" >

           <button class="btn btn-color text-light float-right mt-4">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
@endsection