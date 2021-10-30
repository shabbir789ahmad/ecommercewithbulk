@extends(' Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

 
    
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
      <div class="col-md-2">
       <a class="btn shadow border" href="{{url('admin/orders')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i></a>
      </div>
    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">All Product</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/stock-show')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i></a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('vendor/stock-show')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i></a>
    </div>
  </div>
 </div>
</div>





<div class="c mt-3" id="container-wrapper mt-4">

<div class="row ">
 <div class="col-lg-12">
  <div class="card mb-4">

<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
  <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Product</th>
    <th > Status</th>
    <th>Price</th>
    <th class="col-2">Sell Price</th>
    <th >Discount </th>
    <th >Total Stock </th>
    <th >Remaining Stock </th>
    <th class="text-center">Actions</th>
   </tr>
  </thead>
  <tbody>

   @foreach($stock as $show)
   @if($show['sponser']=='1')
   <tr>
    <td class="a col-1">
      @foreach($show->image as $img)
      <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
      @endforeach
    </td>
    <td class="a col-2">{{$show->product}}</td>
    <td class="a col-2"><span class="bag ">  {{ucfirst($show['sponser'])}}</span><i class="fas fa-tags discount border sponser p-2 " data-id="{{$show['id']}}" ></i></td>
    <td class="a">{{$show['price']}}</td>
    <td class="a col-2"><span class="bag ">  {{ucfirst($show['sell_price'])}}</span></td>
    <td class="a col-2"><span class="bag ">
        @if($show['discount'] > '1')
        {{$show['discount']}}@else 0 @endif</span>
    </td>
    <td class="a col-2">{{$show->stock}}</td>
    <td class="a col-2">{{$show['stock'] - $show['sold_stock']}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
      
       <a href="{{'stock-detail/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'cancel-stock/'.$show['id']}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete all of product data')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>

       </div> 
    </td>
   </tr>
  @endif
   @endforeach
         </tbody>
         </table>
       </div>

{{ $stock->links() }}
  </div>
  </div>
</div>
</div>
  


<!-- Modal -->
<div class="modal fade" id="sopnser_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/sponser-product')}}" method="GET">
          @csrf
          <input type="hidden" name="sponser_id" id="sid">
          <select class="form-control " name="sponser">
            <option disabled hidden selected>Change Sponser Status</option>
            <option value="1">Sponser</option>
            <option value="0">Disapprove</option>
          </select>

         <button type="submit" class="btn btn-primary mt-3 float-right">Save changes</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


 @endsection

