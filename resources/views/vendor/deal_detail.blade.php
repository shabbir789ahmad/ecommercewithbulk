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
  <div class="col-md-3">
   <div class="card">
    <div class="card-body">
    @foreach($deal as $d)
     @if($loop->first)
     <img src="{{asset('uploads/img/' .$d['deal_image'])}}" width="100%">
      <h6 class="text-color font-weight-bold mt-2">Deal Name: <span class="float-right text-dark">{{ucwords($d['deal_name'])}}</span></h6>
      <p class="text-color font-weight-bold mt-2"> End Date: <span class="float-right text-dark">{{ucwords($d['deal_end_date'])}}</span></p>
      <p class="mt-3">{{ucwords($d['deal_detail'])}}</p>
     
      
     @endif
    @endforeach
    </div>
   </div>
  </div>
  <div class="col-lg-9">
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
        @php //dd($deal); @endphp
      @foreach($deal as $d)
      @foreach($product as $pro)
      @if($pro['id']==$d['product_id'])
      <tr>
       <td class=" col-1">
        @foreach($pro->image as $img)
         <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endforeach
       </td>
       <td class=" col-2">{{ucwords($pro->product)}}</td>
       @foreach($pro->stock2 as $st)
       @php $total=$st['stock'] - $st['sold_stock']; @endphp
        <td class=" col-2">{{$st->sell_price}}</td>
        <td class=" col-2">{{$d->product_discount}}</td>
         @if($total<5)
        <td class=" col-2  text-danger" data-toggle="tooltip" data-placement="bottom" title="Low On Stock" style="cursor:pointer;">{{$total}}<i class="fas fa-exclamation-triangle ) text-danger "></i></td>
          @else
          <td class=" col-2 ">{{$total}}</td>
          @endif
       @endforeach
       <td>
        <div class="b d-flex justify-content-center mt-1">
         <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
         <a href="{{url('vendor/delete-deal-product/'.$pro['id']. '/'.$d['deal_id']) }}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i></a>
        </div> 
       </td>
      </tr>
      @endif
      @endforeach
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
           <select class="form-control maincat"  name="" >
            <option disabled selected hidden>select Category</option>
            @foreach($cat as $pro)
           <option value="{{$pro['id']}}">{{$pro['category']}}</option>
           @endforeach
          </select>

           <select class="form-control deal mt-2" id="deal" name="" >
        
          </select>

          <table id="records_table" class="table align-items-center table-flush records_table mt-2" >
           <tr>
            <th>Name</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
           </tr>
          </table>
            @foreach($deal as $d)
            @if($loop->first)
            <input type="hidden" name="deal_id" value="{{$d['deal_id']}}">
            @endif
            @endforeach
           <button class="btn btn-color text-light float-right mt-4">Add</button>
         </form>
      </div>
    </div>
  </div>
</div>

@endsection