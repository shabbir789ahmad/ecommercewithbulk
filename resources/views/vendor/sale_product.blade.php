@extends('vendor.dashboard')
@section('content')


<h4 class=" pro mt-5">All Products</h4>
@foreach($sale as $sl)
  <p class="text-center">Put Your Product In <span class="text-danger font-weight-bold">{{ucwords($sl['sell_name'])}}<span></p>
  @endforeach
<div class="container mt-0 mt-sm-0 mt-md-5" >
 <ul class="nav nav-pills  bg-store p-3" id="pills-tab" role="tablist">
  <li class="nav-item n1">
    <a class="nav-link n2 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Without Sale</a>
  </li>
  <li class="nav-item n1">
    <a class="nav-link n2" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">On Sale</a>
  </li>
 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  	 <!-- top rated-->
     <div class="row mt-3">
		@foreach($product as $st)
	
	 <div class="col-md-4 col-sm-6 col-lg-4 ">
      <div class="card store-card shadow">
        <div class="overly">
      	<a href="{{url('vendor/stock-detail/' .$st['id'])}}">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="300rem" class="store-img">
        @endforeach
      </a>
      @foreach($st->stock as $stock)
     <div class="over-text">
       <p class="sle mt-2" data-id="{{$stock['id']}}">Apply Sale </p>
       </div>
       <div class="over-text2">
        <p class="sle2 text-danger mt-2" data-id="{{$stock['id']}}">{{ceil( ($stock['discount']/$stock['sell_price'])*100)
       }}%</p>
       </div>
       @endforeach
     
    </div>
       <div class="card-body p-0">
       <p class="stor-text text-danger">{{ucfirst($st['product'])}}</p>
       <div class="d-flex">
        <p class="text2">{{ucfirst($st['detail'])}} </p>
       	@foreach($st->stock as $stock)
        <p class="ml-auto mr-2 text2">${{$stock['sell_price']-$stock['discount']}} 
          <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
        
        @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
       
          </div>
       </div>
      </div>
	 </div>

	 @endforeach
	</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	<!-- New Product-->
  	<div class="row mt-3">
		@foreach($product as $st)
      @if($st['on_sale'])
	 <div class="col-md-4 col-sm-6 col-lg-4">
      <div class="card store-card shadow">
      	<a href="">
      		@foreach($st->image as $img)
      	<img src="{{asset('uploads/img/' .$img['rimage'])}}" width="100%" height="400rem" class="store-img">
        @endforeach
      </a>
       <div class="card-body p-0">
        
       <p class="stor-text text-danger">{{ucfirst($st['product'])}}</p>
       <div class="d-flex">
        <p class="text2">{{ucfirst($st['detail'])}} </p>
        @foreach($st->stock as $stock)
       	<p class="ml-auto mr-2 text2">${{$stock['sell_price']-$stock['discount']}} <del class="text-danger">@if($stock['discount']) ${{$stock['sell_price']}} @else @endif</del></p>
        @endforeach
       </div>
      </div>
      <div class="card-footer">
         <div class="text-center rating">
           @for($i=0; $i<5; $i++)
        @if($i<$st['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
          </div>
       </div>
      </div>
	 </div>
   @endif
	 @endforeach
	</div>
  </div>

</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalsale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Put Product On Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('vendor/on-sale')}}">
          @csrf
        <input type="text" name="id" id="sid">
        <label>New Price</label>
        <input type="text" class="form-control" name="sell_price" >
        <label>New Discount</label>
        <input type="text" class="form-control" name="discount" >
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">Update</button>
     </form> 
     </div>
      
       
    </div>
  </div>
</div>
@endsection