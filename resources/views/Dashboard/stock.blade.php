@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('admin/dashboard')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Dashboard
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Upload Stock</h4>
   </div>
 </div>

<a href="{{url('admin/stock-show')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/stock-show')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

<div class="d-flex w-25 mt-3 ">
  <a href="{{url('admin/single-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto text-light p-0 mr-2 btn-color @if(request()->is('admin/add-stock')) act @else sing2 @endif">
    <div class="card-body text-light">
   <i class="fas fa-pencil-alt text-light fa-lg"></i> Single 
   </div>
 </div>
</a> 
    <a href="{{url('admin/add-stock-bulk')}}" class="ml-auto">
   <div class="card shadow border @if(request()->is('admin/add-stock-bulk')) act @else act2 @endif ml-auto p-0 mr-2">
    <div class="card-body text-light">
   <i class="fas fa-pencil-alt text-light fa-lg"></i>Bulk Product
   </div>
 </div>
</a> 
</div>


<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Upload Stock
    </h4>
            
<form action="{{url('admin/new-stock')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 <div class="row">
 

<div class="col-md-6 mt-5">
   <span class="text-danger">@error('cat_id') Main Category Field is required @enderror</span>
<div class="form-group mt-3">
<div class="input-group clockpicker" id="clockPicker1">
  <select class="form-control select" id="main2" name="" required="">
    <option disabled selected hidden> Select Main Category</option>
         @foreach($main as $key=> $mc)
     <option value="{{$key}}">{{ucfirst($mc)}}</option>
     @endforeach
    </select> 
                      
          <div class="input-group-append">
           <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>                      
           </div>
        </div>

<span class="text-danger">@error('sub_id') Category Field is required @enderror</span>
<div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
    <select class="form-control select  " id="sub2" name="" required="">
            
      </select>
   <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-calendar"></i></span>
    </div>                      
   </div>
</div>
           

<span class="text-danger">@error('drop_id') Sub Category Field is required @enderror</span>
 <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">
    <select class="form-control select " id="drop" name="drop_id" required="">

    </select>
   <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
   </div>                      
  </div>
</div>

<span class="text-danger">@error('product') {{$message}} @enderror</span>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="product" placeholder="Product Name" class="form-control "  value="{{old('product')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
 <span class="text-danger">@error('detail') {{$message}} @enderror</span>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="detail" placeholder="Product Detail" class="form-control "  value="{{old('detail')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>

<span class="text-danger">@error('bname') {{$message}} @enderror</span>
                               
   <div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
    <select class="select2-multiple form-control" name="brand[]" multiple="multiple"  required="">
      @foreach($brand as $b)
      <option value="{{$b['bname']}}">{{$b['bname']}}</option>
       @endforeach
    </select>
    <div class="input-group-append">
    <span class="input-group-text add" id="img"><i class="fas fa-store"></i></span>
  </div>
 </div>
</div>
  
<span class="text-danger">@error('rimage') {{$message}} @enderror</span>
  <div class="custom-file mt-2">
    <input type="file" name="rimage[]" class="custom-file-input" id="images" multiple="multiple" />
     <label class="custom-file-label" for="images">Choose image</label>
   </div> 
   <div class="user-image mb-3 text-center" >
                <div class="imgPreview" > </div>
            </div> 

        
   

</div>

<div class="col-md-6">

   <p ><span class="float-right  supply btn-color text-light" data-toggle="modal" data-target="#supply" >Add Supplier</span><span class="float-right mr-2 supply mb-3 btn-color text-light" data-toggle="modal" data-target="#brand" >Add Brand</span></p>  
 <span class="text-danger ">@error('phone') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <select class="form-control" name="supply_id">
      <option disabled selected hidden="">Select Supplier</option>
       @foreach($supply as $sup)
       <option value="{{$sup['id']}}">{{ucfirst($sup['supplier_name'])}}</option>
       @endforeach
     </select>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div> 
  <span class="text-danger">@error('stock') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="stock" placeholder="Total Stock" class="form-control "  value="{{old('stock')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>      

<span class="text-danger">@error('price') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
    <input type="text" name="price" placeholder="Price per Product" class="form-control" value="{{old('price')}}" required="">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
    </div>                      
    </div>
  </div>
 <span class="text-danger">@error('sell_price') {{$message}} @enderror</span>   
 <div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
  
   <input type="text" name="sell_price" placeholder=" Selling Price per Product" class="form-control " value="{{old('sell_price')}}" required="">
 
            
  <div class="input-group-append">
    <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
   </div>                      
 </div>
 </div>
 <span class="text-danger">@error('ship') {{$message}} @enderror</span>   
 <div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
  
   <input type="text" name="ship" placeholder=" Shipping Cost" class="form-control " value="{{old('ship')}}" required="">
 
            
  <div class="input-group-append">
    <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
   </div>                      
 </div>
 </div>

<div class="color" id="more">
  
<div class="form-group" >
 <div class="input-group clockpicker" id="clockPicker1">

        <input type="color" name="" placeholder="Product Color" class="form-control " id="color"  value="" required="">
   
    <div class="input-group-append">
    <span class="input-group-text add" id="add"><i class="fas fa-plus"> Add</i></span>
    </div>                      
    </div>
  </div>
</div> 
<div class="colors d-flex" id="box">

<span class="text-danger">@error ('color') {{$message}} @enderror</span>
</div>
 <div class="img" id="more">
 <div class="form-group" >
   <div class="input-group clockpicker" id="clockPicker1">
       <input type="text" name="" placeholder="Product Size" class="form-control" multiple  id="sizes" required="">
       <div class="input-group-append">
        <span class="input-group-text add" id="size"><i class="fas fa-plus">Add</i></span>
       </div>                      
    </div>
  </div>
</div>       
<div class="size d-flex mb-5" id="box2">

<span class="text-danger">@error ('color') {{$message}} @enderror</span>
</div>


</div>
</div>

  <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
  </form>
 </div>        
</div>
</div>

 



<div class="modal fade" id="supply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/add-supplier')}}" method="POST">
          @csrf
      
      <label>Name</label>
      <input type="text" name="supplier_name" placeholder="name" class="form-control" >
      <span class="text-danger">@error ('supplier_name'){{$message}}@enderror</span>
      <label>Address </label>
      <input type="text" name="address" placeholder="Address" class="form-control" >
      <span class="text-danger">@error ('address'){{$message}}@enderror</span>
     <label>Phone </label>
      <input type="text" name="phone" placeholder="Phone" class="form-control" >
      <span class="text-danger">@error ('phone'){{$message}}@enderror</span>
     
      
      <button class="btn btn-color btn-lg float-right text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Selling Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/upload-brand')}}" method="POST">
          @csrf
      
      <label>Name</label>
      <input type="text" name="bname" placeholder="Brand Name" class="form-control" />
      <span class="text-danger">@error ('bname'){{$message}}@enderror</span>
     
    
     
      
      <button class="btn btn-color btn-lg float-right text-light  mt-4">Update</button>
    </form>
      </div>
      
    </div>
  </div>
</div>
@endsection
