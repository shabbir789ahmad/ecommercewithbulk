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
  <h4 class="text-center font-weight-bold text-color">Upload Product</h4>
   </div>
 </div>

<a href="{{url('admin/get-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/get-product')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
 
 <div class="d-flex w-25 mt-3 ">
  <a href="{{url('admin/single-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto text-light p-0 mr-2 btn-color @if(request()->is('admin/single-product')) act @else sing2 @endif">
    <div class="card-body text-light">
   <i class="fas fa-pencil-alt text-light fa-lg"></i> Single
   </div>
 </div>
</a> 
    <a href="{{url('admin/product')}}" class="ml-auto">
   <div class="card shadow border @if(request()->is('admin/product')) act @else act2 @endif ml-auto p-0 mr-2">
    <div class="card-body text-light">
   <i class="fas fa-pencil-alt text-light fa-lg"></i>Bulk Product
   </div>
 </div>
</a> 
</div>

<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Upload Product
    </h4>
            


<div class="row mt-5">
<div class="col-md-4">
 <div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
   <select class="form-control select " id="main2" name="" required="">
    <option disabled selected hidden> Select Main Category</option>
         @foreach($main as $key=> $mc)
    <option value="{{$key}}">{{ucfirst($mc)}}</option>
     @endforeach
   </select> 
    <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-calendar"></i></span>
    </div>                      
  </div>
    <span class="text-danger">@error('cat_id') Main Category Field is required @enderror</span>
 </div>
</div>
<div class="col-md-4">
<div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
    <select class="form-control select  " id="sub2" name="" required="">
            
      </select>
   <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-calendar"></i></span>
    </div>                      
   </div>
   <span class="text-danger">@error('sub_id') Category Field is required @enderror</span>
</div>
 </div>          
<div class="col-md-4">
 <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">
    <select class="form-control select " id="drop" name="drop_id" required="">

    </select>
   <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
   </div>                      
  </div>
 </div>
</div>


</div>     
</div>
</div>


<div class="card">
 <div class="card-body">
   <form action="{{url('admin/bulk-stock')}}" method="POST" enctype="multipart/form-data" class="mt-5">
  @csrf
   <div id="example-6" class="content">
  <div class="row group mt-5">
      
    <div class="col-md-5">
      <div class="form-group">
     <span class="text-danger">@error('product') {{$message}} @enderror</span>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="product[]" placeholder="Product Name" class="form-control "  value="{{old('product')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
 <span class="text-danger">@error('detail') {{$message}} @enderror</span>
<div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="detail[]" placeholder="Product Detail" class="form-control "  value="{{old('detail')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
<input class="form-control mt-2"  type="hidden" name="drop_id[]" id="ds" />

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
<span class="text-danger ">@error('supply_id') {{$message}} @enderror</span>
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <select class="form-control" name="supply_id[]">
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
     <span class="text-danger">@error('rimage') {{$message}} @enderror</span>
  <div class="custom-file mt-2">
    <input type="file" name="rimage[]" class="custom-file-input" id="images" multiple="multiple" />
     <label class="custom-file-label" for="images">Choose image</label>
   </div> 
   <div class="user-image mb-3 text-center" >
       <div class="imgPreview" > </div>
    </div>
 
      </div>
    </div>
    <div class="col-md-5">
   
  <span class="text-danger">@error('stock') {{$message}} @enderror</span>
                               
  <div class="form-group">
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="stock[]" placeholder="Total Stock" class="form-control "  value="{{old('stock')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>      

<span class="text-danger">@error('price') {{$message}} @enderror</span>
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
    <input type="text" name="price[]" placeholder="Price per Product" class="form-control" value="{{old('price')}}" required="">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
    </div>                      
    </div>
  </div>
      <span class="text-danger">@error('sell_price') {{$message}} @enderror</span>   
 <div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
  
   <input type="text" name="sell_price[]" placeholder=" Selling Price per Product" class="form-control " value="{{old('sell_price')}}" required="">
 
            
  <div class="input-group-append">
    <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
   </div>                      
 </div>
 </div>
 <span class="text-danger">@error('ship') {{$message}} @enderror</span>   
 <div class="form-group">
  <div class="input-group clockpicker" id="clockPicker1">
  
   <input type="text" name="ship[]" placeholder=" Shipping Cost" class="form-control " value="{{old('ship')}}" required="">
 <div class="input-group-append">
    <span class="input-group-text px-3"><i class="fas fa-info"></i></span>
   </div>                      
 </div>
 </div>

    
    
     <div class="color mt-2" id="more">
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

<span class="text-danger">@error ('size') {{$message}} @enderror</span>
</div>
      
    </div>
   <div class="col-md-2">
      <button type="button" id="btnAdd-6" class="btn btn-primary"><i class="fas fa-plus"></i></button>
      <button type="button" class="btn btn-danger btnRemove"><i class="fas fa-times"></i></button>
    </div>
  
  </div>
</div>
    <button  class="btn sb btn-block btn-color text-light mt-5"  disabled>Submit</button>
</form>
 </div>
</div>
@endsection


  

  