@extends('vendor.dashboard')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">
<div class="card shadow d-flex border  p-0 ">
  
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('vendor/new-deals')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
      
     <h4 class="text-center font-weight-bold mt-3 text-color">Deals Details</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/all-deals')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/all-deals')}}">
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
    <button class="btn btn-color text-light float-right mb-2" data-toggle="modal" data-target="#exampleModal">Add Product</button>
     <table class="table align-items-center table-flush" id="dataTable">
      <thead class="thead-light">
       <tr>
        <th>Image </th>
        <th>Product</th>
        <th >Price</th>
        <th >Discount</th>
        <th >Stock</th>
        <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($deal as $d)
      
      <tr>
       <td class=" col-1">
        @foreach($d->image as $img)
         <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endforeach
       </td>
       <td class=" col-2">{{ucwords($d->product)}}</td>
       
       @php $total=$d['stock'] - $d['sold_stock']; @endphp
        <td class=" col-2">{{$d->sell_price}}</td>
        <td class=" col-2">{{$d->discount}}</td>
         @if($total<5)
        <td class=" col-2  text-danger" data-toggle="tooltip" data-placement="bottom" title="Low On Stock" style="cursor:pointer;">{{$total}}<i class="fas fa-exclamation-triangle ) text-danger "></i></td>
          @else
          <td class=" col-2 ">{{$total}}</td>
          @endif
      
       <td>
        <div class="b d-flex justify-content-center mt-1">
         <a href="javascript:void()"  class="border shadow  py-2 px-3 ml-1 detail" data-id="{{$d['id']}}" data-discount="{{$d['discount']}}" data-sell="{{$d['sell_price']}}"><i class="fas fa-pen text-success"></i></a>

         <a href="{{url('vendor/delete-deal-product/'.$d['id']. '/'.$d['stock_id']) }}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i></a>
        </div> 
       </td>
      </tr>

      @endforeach
      </tbody>
     </table>

    </div>
   </div>
  </div>
 </div>
</div>



<!--add deal product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{url('vendor/add-deal-product')}}" method="POST">
           @csrf
            <input type="hidden" name="id" id="detail_id">
            <label>New Price</label>
            <input type="text" name="sell_price" class="form-control " id="price">
            <label class="mt-2">New Discount</label>
            <input type="text" name="discount" class="form-control " id="disc">


           <button class="btn btn-color text-light float-right mt-4">Add</button>
         </form>
      </div>
    </div>
  </div>
</div>

@endsection