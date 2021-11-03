@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3 d-none  d-md-flex mr-1">

    <a href="{{url('vendor/new-sale')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> New Sale
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
     <div class="card-body text-dark">
      <h4 class="text-center font-weight-bold text-color">All Sale</h4>
     </div>
    </div>

<a href="{{url('vendor/all-sale')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('vendor/all-sale')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

<div class="c mt-3" id="container-wrapper ">
 <div class="row">
  <div class="col-lg-12">
   <div class="card mb-4">
    <div class="row mt-3">
     <div class="col-md-4 col-12">
      <select class="custom-select ml-0 ml-md-2 w-100 " id="shedule" >
        <option selected disabled hidden>Filter Sale</option>
        <option value="online">Online Now Sale</option>
        <option value="finished">OffLine Sale</option>
        <option value="shedule">Schedule Sale</option>
      </select>
     </div>
     <div class="col-md-4"></div>
     <div class="col-md-4 col-12">
      @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      <form class="form-inline my-2 my-lg-0 w-100" method="GET" action="{{url('admin/search-sale')}}">
       <input class="form-control mr-sm-2 w-75" type="search" placeholder="Search" name="search">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
     </div> 
    </div>

   
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Sale Name</th>
    <th >Sale Start Time</th>
    <th >Sale End Time</th>
    <th >Sale Status</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($sale as $show)
   
  <tr>
    <td class="a">{{ucfirst($show['sale_name'])}}</td>
    <td class="a">{{ucfirst($show['sale_start'])}}</td>
    <td class="a">{{ucfirst($show['sale_end'])}}</td>
    <td class="a col-2" ><input type="checkbox" data-id="{{ $show['id'] }}" name="sale_status" class="js-switch6" 
     {{ $show->sale_status == 1 ? 'checked' : '' }} ></td>
   
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="javascript:void(0)" class="border shadow  py-2 px-3 saleupdate" data-id="{{$show['id']}}" data-name="{{$show['sale_name']}}" data-start="{{$show['sale_start']}}" data-end="{{$show['sale_end']}}"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'sale-delete/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
       
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $sale->links() }}
  </div>
  </div>
</div>


<!--sale Update Modal -->
<div class="modal fade" id="vendorsalemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/update-vendor-sale')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="vid">
          <label>Choose New Sale Name</label>
          <input type="text" class="form-control " name="sale_name" id="vname">
           <label class="mt-2">Choose New Sale Start Time</label>
          <input type="datetime-local" class="form-control " name="sale_start" id="strt">
          <p class="text-danger" id="vstart"> </p>
          <label class="mt-2">Choose New Sale End Time</label>
          <input type="datetime-local" class="form-control " name="sale_end" id="en">
          <p class="text-danger" id="vend"> </p>
          <button class="btn-sm btn-color btn bt rounded float-right text-light mt-4">Update</button>
        </form>
      </div>
     
    </div>
  </div>
</div>

<form id="form-shedul">
  <input type="hidden" name="sale_sche" id="sale-sh">
</form>
 @endsection