@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/sell')}}">
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

<a href="{{url('admin/show-sale')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/show-sale')}}">
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
      <select class="form-control ml-2" id="shedule">
        <option selected disabled hidden>Filter Sale</option>
        <option value="online">Online Now Sale</option>
        <option value="finished">OffLine Sale</option>
        <option value="shedule">Schedule Sale</option>
      </select>
     </div>
     <div class="col-md-4"></div>
     <div class="col-md-4">
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
    <th>Image</th>
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
    <td class="a col-2"><img src="{{asset('uploads/img/' .$show['image'])}}" width="100%"></td>
    <td class="a">{{ucfirst($show['sell_name'])}}</td>
    <td class="a">{{ucfirst($show['start_time'])}}</td>
    <td class="a">{{ucfirst($show['end_time'])}}</td>
    <td class="a col-2" ><input type="checkbox" data-id="{{ $show['id'] }}" name="sell_status" class="js-switchsa" 
     {{ $show->sell_status == 1 ? 'checked' : '' }} ></td>
   
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="" class="border shadow  py-2 px-3 sale" data-id="{{$show['id']}}" data-name="{{$show['sell_name']}}" data-start="{{$show['start_time']}}" data-end="{{$show['end_time']}}"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-sale/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
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
<div class="modal fade" id="salemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/update-sale')}}" method="POST">
          @csrf
          <input type="hidden" name="id" id="sid">
          <label>Choose New Sale Name</label>
          <input type="text" class="form-control " name="sell_name" id="sell">
           <label class="mt-2">Choose New Sale Start Time</label>
          <input type="datetime-local" class="form-control " name="start_time" id="strt">
          <label class="mt-2">Choose New Sale End Time</label>
          <input type="datetime-local" class="form-control " name="end_time" id="en">

          <button class="btn-sm btn-color bt rounded float-right text-light mt-4">Update</button>
        </form>
      </div>
     
    </div>
  </div>
</div>

<form id="form-shedul">
  <input type="hidden" name="sale_sche" id="sale-sh">
</form>
 @endsection