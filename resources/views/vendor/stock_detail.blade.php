@extends('vendor.dashboard')
@section('content')
  
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
     
      <div class="col-md-1">
       <a class="btn shadow border" href="{{url('add-stock')}}">
        <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i>
       Products</a>
      </div>
      <div class="col-md-1">
       <a class="btn shadow border" href="{{url('dashboard')}}">
        <i class="fas fa-store text-success text-center fa-2x mt-2"></i>
         Dashboard</a>
      </div>

    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">Update or Delete stock</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('stock-show')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i>Update</a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('stock-show')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i>Delete</a>
    </div>

  </div>
 </div>
</div>
  
  <div class="card mt-2 " >
    <div class="card-body">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item ml-2">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">All Stock</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Product filter</a>
  </li>
</ul>
    </div>
  </div>



<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- product image-->
    <div class="card">
 <div class="card-body">
  <div class="row">
    <div class="col-md-1 col-sm-1  mt-3 mb-2 box2" >
  
     @foreach($image as $d)
      <div class="box  " onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" width="100%" class=" d-block mt-1">
       </div>

      @endforeach

   
    </div>
    <div class="col-md-5 col-sm-10 mt-md-3  ">
     <div class="con mt-1  " id="mimage">
      @foreach($image as $d)
      @if($loop->first)
       <img  id="mimg" src="{{asset('uploads/img/' .$d['rimage'])}}" class="img-fluid d-block imgb border rounded" style="width: 90%; height: 35rem; overflow: hidden; ">
        <a href="{{url('vendor/delete-image/' .$d['id'])}}"> <p class="overlay2 ">Delete</p></a> 
         <p class="overlay3 "  data-imgi="{{$d['image_id']}}"  id="update">Update {{$d['image_id']}}</p>
      @endif
      @endforeach 
           
     </div>
    </div>
    <div class="col-md-6">
       
   <h6 class="font-weight-bold mt-3">Add New Stock</h6> 
    <hr class="mt-2">
   <div class="forme ">
    <form class="mt-4" action="{{url('vendor/upate-stock')}}" method="POST" enctype="multipart/form-data">
      @csrf
       <label>Price Per Product</label>
    <div class="form-group ml-2">
     <div class="input-group clockpicker" id="clockPicker1">
      <input type="text" name="price" class="form-control" id="price">
      <div class="input-group-append">
        <span class="input-group-text"><i class="fab fa-stock-hunt"></i></span>
      </div>                      
     </div>
    </div>
     <label>New Stock</label>
    <div class="form-group ml-2">
      <div class="input-group clockpicker" id="clockPicker1">
       <input type="text" name="stock" class="form-control" id="stock">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-stock-hunt"></i></span>
       </div>                      
     </div>
    </div>
     <label>New Seling Price</label>
    <div class="form-group ml-2">
      <div class="input-group clockpicker" id="clockPicker1">
       <input type="text" name="sell_price" class="form-control" id="stock">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-stock-hunt"></i></span>
       </div>                      
      </div>
    </div>
     <label>New Shipping Cost</label>
    <div class="form-group ml-2">
      <div class="input-group clockpicker" id="clockPicker1">
       <input type="text" name="ship" class="form-control" id="stock">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-stock-hunt"></i></span>
        </div>                      
      </div>
    </div>
    <label>New Supplier Name</label>
    <div class="form-group ml-2">
     <div class="input-group clockpicker" id="clockPicker1">
      <select class="form-control" name="supply_id">
        <option disabled selected hidden>Select Supplier</option>
        @foreach($supply as $sup)
        <option value="{{$sup['id']}}">{{$sup['supplier_name']}}</option>
        @endforeach
      </select>
      <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-stock-hunt"></i></span>
      </div>                      
     </div>
    </div>
   <input type="hidden" name="stock_id" value="{{$stock['id']}}">
      
  <button class="btn-color btn text-light btn-block mt-5">Update</button>
     </form>
    </div>
     
   </div>
  </div>
 </div>
</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- All Stocks-->
   

<div class="row mt-2">
  <?php $i=1;?>
 
  <div class="col-md-12">
   <div class="card mt-2">
 <div class="card-body">
   <h6 class="font-weight-bold">All Stocks </h6>
    <hr class="mt-2">
      <p  class="filter2 mt-3 d-block">
        <table class="table align-items-center table-flush" id="dataTable">
  <thead class="thead-light">
   <tr>
      <th scope="col">No#</th>
      <th scope="col">Stock</th>
      <th scope="col">Supplier</th>
      <th scope="col" >Price</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Discount</th>
      <th scope="col " class="text-center">Status</th>
      <th scope="col " class="text-center">Date</th>
   
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach($stock2 as $stock)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$stock['stock']}}</td>

      @foreach($supply as $sup)
       @if($stock['supply_id'] == $sup['id'])
      <td>{{ucfirst($sup['supplier_name'])}}</td>
      @endif
      @endforeach
      <td class="a ">{{$stock['price']}}</td>
      <td class="  "><span class="bag ">  {{ucfirst($stock['sell_price'])}}</span>
     <i class="fas fa-tags discount border mt-3 p-2 sell" data-id="{{$stock['id']}}" data-price="{{$stock['sell_price']}}"></i>
    </td>
    <td  ><span class="bag ">
     @if($stock['discount'] > '1')
     {{$stock['discount']}}@else 0 @endif</span>
     <i class="fas fa-warehouse mt-3 discount border p-2 dis" data-id="{{$stock['id']}}"  data-price="{{$stock['discount']}}"></i>
    </td>
    <td class="border"><input type="checkbox" data-id="{{ $stock['id'] }}" name="stock_status " class="js-switch5 " 
      {{ $stock->stock_status == 1 ? 'checked' : '' }} >
    </td>
    <td ><span class="badge badge-success">{{date('d-m-Y', strtotime($stock['created_at']))}}</span>
      
    </td>
   
    <td class="border">
     <div class="b d-flex justify-content-center mt-1">
      
       <a class="border shadow  py-2 px-3 ml-1 stock" data-id="{{$stock['id']}}" data-price="{{$stock['price']}}" data-sell="{{$stock['sell_price']}}" data-stoc="{{$stock['stock']}}" data-ship="{{$stock['ship']}}" data-stid="{{$stock['stock_id']}}"><i class="fas fa-pen text-success"></i>
        
        <a href="{{url('vendor/delete-stock/'.$stock['id'])}}" class="border shadow  py-2 px-3 ml-1" onclick="return confirm('Are you sure? This will delete the Stock')"><i class="fas fa-trash-alt  text-danger "></i>
       </a>

       </div> 
    </td>
    </tr>
      @endforeach
  </tbody>
 </table>
</p>
   
 </div>
</div>
  </div>
 
  <div class="col-md-6">

  </div>
</div>

  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!-- Product filter-->
   
<div class="row mt-3" style="color:#c14646">
<div class="col-md-6 ">
   @if ($alert = Session::get('success2'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card">
 <div class="card-body">
   <h6 class="font-weight-bold">Color <span class="float-right">Status</span></h6>
    <hr class="mt-2">
  @php //dd($colors); @endphp
     @foreach($colors as $color)
      <p  class="filter2 mt-3 d-block">
      <i class="fas fa-circle fa-2x "
       style="color:{{$color['color']}} "></i>
        
    <i class="fas fa-edit text-success border ml-5 shadow p-2 book-color" data-id="{{$color['id']}}" data-color="{{$color['color']}}" data-status="{{$color['color_status']}}" data-filter="{{$color['filter_id']}}" ></i>
      
       <a href="{{url('vendor/delete-color/' .$color['id'])}}">
       <i class="fas fa-trash-alt text-danger border shadow p-2"  data-id="{{ $color->id }}"></i></a>
      
       <i class="fas fa-plus text-success colornew p-2 border shadow" data-id="{{$color['filter_id']}}" > </i>

       <input type="checkbox" data-id="{{ $color['id'] }}" name="color_status" class="js-switch2 " 
     {{ $color->color_status == 1 ? 'checked' : '' }} >
     </p>
    @endforeach
 </div>
</div>
</div>
<div class="col-md-6">
    @if ($alert = Session::get('size'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card">
  <div class="card-body">
    <h6 class="font-weight-bold">Sizes <span class="float-right">Status</span></h6>
     <hr class="mt-2">
    <div class=" top_cat ">
       @foreach($size as $siz)  
        @if($siz) 
        <p  class="filter2 mt-3 d-block"> 
         <button class="btn btn-sm btn-outline-secondary">{{$siz['size']}}</button>
        
           <i class="fas fa-edit text-success  ml-5 shadow book-size border p-2" data-id="{{$siz['id']}}" data-size="{{$siz['size']}}" data-status="{{$siz['size_status']}}" data-sid="{{$siz['size_id']}}"></i>
         
         <a href="{{url('vendor/delete-size/' .$siz['id'])}}">
           <i class="fas fa-trash-alt  text-danger  shadow border p-2" ></i>
         </a>
         <i class="fas fa-plus text-success sizenew p-2 border  shadow" data-id="{{$siz['size_id']}}" > </i>

         <input type="checkbox" data-id="{{ $siz['id'] }}" name="size_status" class="js-switch3 " 
         {{ $siz->size_status == 1 ? 'checked' : '' }} >
     </p>
      @endif
     @endforeach
    </div>
  </div>
</div>
</div>
<div class="col-md-6">
 
  @if ($alert = Session::get('brand'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card mt-2">
  <div class="card-body">
    <h6 class="font-weight-bold">Brands <span class="float-right">Status</span></h6>
    <hr class="mt-2">
  <div class="top_cat ml-3 filter">
   <ul class="list-unstyled">
    @foreach($store as $br)
    <li>
      <i class="fas fa-caret-right mr-2 fa-lg"></i>{{$br['brand']}}
       
      <i class="fas fa-edit text-success ml-5 btn-book border shadow p-2" data-id="{{ $br['id'] }}" data-brand="{{ $br['brand'] }}" data-status="{{ $br['brand_status'] }}" data-bid="{{ $br['brand_id'] }}"></i>

       <a href="{{url('vendor/delete-brand/' .$br['id'])}}">
       <i class="fas fa-trash-alt text-danger shadow border p-2">
       </i></a>
        <i class="fas fa-plus text-success brandnew p-2 border shadow" data-id="{{$br['brand_id']}}" > </i>
         
     <input type="checkbox" data-id="{{ $br['id'] }}" name="brand_status" class="js-switch4 " 
     {{ $br->brand_status == 1 ? 'checked' : '' }} >
    </li>
    @endforeach
      
  </ul>
</div>



 </div>
</div>
</div>
</div>


  </div>
</div>











<!--Brand Modal -->
<div class="modal fade" id="brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header text-dark" >
        <h5 class="modal-title" id="exampleModalLongTitle">Update Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/update-store')}}" method="POST">
            @csrf
          <input type="hidden" id="id" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" id="brand" name="brand"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="brand_status" name="brand_status" value="">
        <input type="hidden" id="brand_id" name="brand_id" value="">
        <button class="btn-color btn text-light float-right mt-5 btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>


<!--brand Modal 2-->
<div class="modal fade" id="brand-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/add-store')}}" method="POST">
            @csrf
        
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" name="brand" placeholder="Brand Name" class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        
        <input type="text"  name="brand_id" id="br">
        <button class="btn-color btn text-light float-right mt-5 btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--size Modal -->
<div class="modal fade" id="size-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/update-size')}}" method="POST">
            @csrf
          <input type="hidden" id="sid" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" id="size" name="size"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="size_status" name="size_status" value="">
        <input type="hidden" id="size_id" name="size_id" value="">
        <button class="btn-color mt-5 float-right text-light btn btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--size Modal 2-->
<div class="modal fade" id="size-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add More Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/add-size')}}" method="POST">
            @csrf
         <div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
    
    <input type="text" name="size" class="form-control"> 
    <div class="input-group-append">
     <span class="input-group-text add" id="img"><i class="fas fa-store"></i></span>
    </div>
 </div>
</div>
        
        <input type="text"  name="size_id" id="sizen">
        <button class="btn-color mt-5 float-right text-light btn btn-lg">Add</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--color Modal -->
<div class="modal fade" id="color-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/update-color')}}" method="POST">
            @csrf
          <input type="hidden" id="cid" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="color" id="color" name="color"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="color_status" name="color_status" value="">
        <input type="hidden" id="filter_id" name="filter_id" value="">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--color Modal 2-->
<div class="modal fade" id="color-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/add-color')}}" method="POST">
            @csrf
         
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1"> 
           <input type="color" name="color"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        
        <input type="text"  name="filter_id" value="" id="filter">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Add </button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--image Modal -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('vendor/update-image')}}" method="POST" enctype="multipart/form-data">
            @csrf
       
       <div class="form-group">
        <div class="input-group clockpicker" id="clockPicker1"> <input type="file" name="rimage"  class="form-control "  >
        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
       <input type="hidden"  name="image_id" id="img_id" value="">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Update </button>
         </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="sell_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/upate-price')}}" method="POST">
          @csrf
      <input type="hidden" name="id" id="sell_id">
      <label>Product Selling Price</label>
      <input type="hidden" name="sell_price"  class="form-control" id="sell_price">
     <br>
      
      <button class="btn btn-color float-right  text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>



<div class="modal fade" id="dis_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/upate-discount')}}" method="POST">
          @csrf
      <input type="hidden" name="id" id="d_id">
      <label>Product Selling Price</label>
      <input type="text" name="discount"  class="form-control" id="discount">
     <br>
      
      <button class="btn btn-color float-right  text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="stock_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('vendor/update-stock2')}}" method="POST">
          @csrf
          <input type="text" name="id" id="ids">
        <label>Price Per Product</label>
       <input type="text" name="price" class="form-control" id="prices">
     
     <label>New Stock</label>
     <input type="text" name="stock" class="form-control" id="stocks">
      
     <label>New Seling Price</label>
   
       <input type="text" name="sell_price" class="form-control" id="sells">
       
     <label>New Shipping Cost</label>
   
       <input type="text" name="ship" class="form-control" id="ships">
       
    <label>New Supplier Name</label>
   
      <select class="form-control" name="supply_id">
        <option disabled selected hidden>Select Supplier</option>
        @foreach($supply as $sup)
        <option value="{{$sup['id']}}">{{$sup['supplier_name']}}</option>
        @endforeach
      </select>
      
   <input type="hidden" name="stock_id" value="" id="stock_ids">
      
      <button class="btn btn-color float-right  text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
  
  function changepic(a)
    {
      document.querySelector(".imgb").src=a.children[0].src;
       
    }
</script>

@endsection