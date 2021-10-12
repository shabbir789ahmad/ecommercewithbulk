@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('get-product')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">Update or Delete Product</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>

<div class="row mt-4">
  <div class="col-md-4">
   <select class="form-control" onchange="sort()" id="cat">
    <option selected="" disabled hidden="" >Sort By Category</option>
    @foreach($main as $m)
  <option value="{{$m['id']}}">{{ucfirst($m['category'])}}</option>
  @endforeach
</select>

  </div>
  <div class="col-md-4">
     <select class="form-control" onchange="sort2()" id="sub_cat">
    <option selected="" disabled hidden="" >Sort By Sub Category</option>
    @foreach($sub as $s)
  <option value="{{$s['id']}}">{{ucfirst($s['name'])}}</option>
  @endforeach
</select>
  </div>
  <div class="col-md-4">
    <form>
  <input type="text" name="search" class="form-control" placeholder="Search Here"> 
</form>
  </div>
</div>


<div class="c mt-3" id="container-wrapper mt-4">
<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4">
 
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Detail</th>
    <th >Price</th>
    <th >Discounted Price</th>
    <th >Status</th>
    <th >Stock</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($product as $show)
   <tr>
    <td class="a col-1"><img src="{{asset('uploads/img/'.$show['rimage'])}}" width="100%"> </td>
    <td class="a">{{ucfirst($show['name'])}}</td>
    <td class="a">{{ucfirst($show['detail'])}}</td>
    <td class="a">{{ucfirst($show['price'])}}</td>
    <td class="a ">{{ucfirst($show['discount'])}}</td>
    <td class="a col-1">
    <input type="checkbox" data-id="{{ $show['id'] }}" name="product_status" class="js-switch " 
     @if($show->product_status==1 && $show->total > 0 )
      checked @else  @endif>
    </td>
    <td class="a ">{{ucfirst($show['total'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'update-product/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i>
       </a>
       <a href="{{'delete-product/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"></i>
       </a>
      </div> 
    </td>
   </tr>
       
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $product->links() }}
  </div>
  </div>
</div>
</div>
</div>

<form id="cat_form">
  <input type="hidden" name="category" id="category">
</form>
<form id="sub_form">
  <input type="hidden" name="sub_category" id="sub_category">
</form>
 @endsection

