@extends('vendor.dashboard')
@section('content')


<h4 class=" pro mt-5">All Products</h4>
@foreach($sale as $sl)
  <p class="text-center">Put Your Product In <span class="text-danger font-weight-bold">{{ucwords($sl['sell_name'])}}<span></p>
  @endforeach

  <div class="container d-flex" style="height: 4rem; background: #166387;">

   <div class="nav-btn ">
     <div class="nav-links">
      <ul>
       <li class="nav-link" style="--i: .85s">
        <a href="#">Category<i class="fas fa-caret-down"></i></a>
         <div class="dropdown">
          <ul>
            @foreach($cat as $c)
            <li class="dropdown-link" >
             <a href="#">{{$c['category']}}<i class="fas fa-caret-down"></i></a>
              <div class="dropdown second">
               <ul>
                @foreach($c->submenue as $sub)
                <li class="dropdown-link">
                 <a href="#">{{$sub['smenue']}}<i class="fas fa-caret-down"></i></a>
                 <div class="dropdown second">
                 <ul>
                  @foreach($c->dropdown as $drop)
                  <li class="dropdown-link">
                   <a href="">{{$drop['name']}}</a>
                  </li>
                  @endforeach
                  <div class="arrow"></div>
               </ul>
              </div>
            </li>
            @endforeach
            <div class="arrow"></div>
          </ul>
        </div>
       </li>
       @endforeach
       <div class="arrow"></div>
     </ul>
    </div>
   </li>
  </ul>
</div>
</div>

<button class="btn-store ml-1">Button</button>
<button class="btn-store ml-1">Button</button>
<button class="btn-store ml-1">Button</button>
</div>

<div class="container-fluid">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
</div>





<!--put product on Modal -->
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


<!--put product on Modal -->
<div class="modal fade" id="endsale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disable Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('vendor/out-sale')}}">
          @csrf
        <input type="hidden" name="id" id="eid">
        <label>Update New Price</label>
        <input type="text" class="form-control" name="sell_price" id="sell-end">
        <label class="mt-2">Update New Discount</label>
        <input type="text" class="form-control" name="discount" id="dis">
       <button class="btn btn-color float-right btn-lg mt-4 text-light rounded">End Sale</button>
     </form> 
     </div>
      
       
    </div>
  </div>
</div>
@endsection