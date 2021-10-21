@extends('master.master')
@section('content')
 <title>Product Detail</title>


<div class="container-fluid" style="overflow:hidden">
 <div class="row">
  <div class="col-md-6 col-12 col-sm-12 d-flex d-sm-flex d-md-block img-overfow mt-3 mb-2" >
    <div class="row">
       <div class="col-md-8 order-md-4">
        <div class="cont" id="mimage">
          @foreach($image as $d)
          @if($loop->first)
          <div class="block ">
           <img id="mimg" src="{{asset('uploads/img/' .$d['rimage'])}}" alt="Image To Zoom" class="block__pic imgs  ml-5 ml-md-0  rounded shadow" data-title="Red Valentino" data-help="Используйте колесико мыши для Zoom +/-">
         </div>
         @endif
         @endforeach            
        </div>
       </div>
       <div class="col-md-4 col-lg-3 order-md-1 mt-1 mt-dm-0 details-images">
        @foreach($image as $d)
        <div class=" ml-0 ml-md-5" style="display: inline-block;" onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" height="150rem" class="  mt-1 rounded border"  >
       </div>
       @endforeach
      </div>
    </div>
  </div>
    

<div class="col-md-6 mt-2 mr-0 col-sm-12 ">
 <div class="row">
  <div class="col-md-12 col-6">
  
    <p class=" names ml-3 ml-md-0 mt-1 mt-md-3" > {{ucwords($detail['product'])}}<span class="float-right store mr-4"><a href="{{url('store/'.$detail['user_id'])}}">Visit Store</a></span></p>
    <p class="text-dark name3 ml-3 ml-md-0">{{ucwords($detail['detail'])}}<br>
  <span class="text-dark"  style="font-size: 1.5rem;">
     @if($detail['rating'])
  @for($i=0; $i<5; $i++)
  @if($i<$detail['rating'])
   <span class="fa fa-star checked fa-xs"></span>
  @else
   <span class="fa fa-star fa-xs"></span>
   @endif
   @endfor
   @endif
   </span>
  </p>
    </div>
    <hr class="text-dark d-none d-md-block hr" >
    <hr class="mt-3">
    <div class="col-md-12 col-6 ">
      
       <h5 class=" names ml-2  ml-md-0">${{$stock2['sell_price']- $stock2['discount']}}
    <span>
      <small class="text-danger"> <del>${{$stock2['sell_price']}}</del>
       </small>
    </span>
  </h5>
 
    </div>
    
    <hr class="text-dark d-none d-md-block hr" >
 <div class="col-md-8 col-12 col-sm-12 col-lg-8">
  <div class="col-md-12 col-6">
    <p class=" text-dark   ml-3 ml-md-0">Color:  <br> 
   <span >
    @foreach($color as $s)
    <label class="containers " onclick="cartcolor('{{$s['color']}}') ">
     <input type="radio" checked="" name="radio"  >
     <span class="checkmark" style="
      position: absolute;
      top: 0;
      left: 0;
      height: 2.3rem;
      width: 2.3rem;
      padding: 11% 0;
      text-align: center;
      background-color:{{$s['color']}};
      border-radius: 5%;" >
      </span>
     </label>
    @endforeach
    </span>
  </p>
 </div>
  <div class="col-md-12 mt-3 col-6">
    <h5 class="ml-1 mt-0 mt-md-3 text-dark">Size:</h5>
   <div class="d-flex mt-0 mt-md-3 mb-4">
    @foreach($size as $s)
     <label class="span " >
      <input type="radio" checked="" name="size" value="{{$s['size']}}" onclick="cartsize('{{$s['size']}}') ">
      <span class="checkmark" style="
      position: absolute;
      top: 0;
      left: 0;
      padding: 11% 0;
      height: 2.3rem;
      width: 2.3rem;
      border: 1px solid #1F2833;
      border-radius: 5%;
      text-align: center;">{{$s['size']}}</span>
     </label>
    @endforeach
   </div>
  </div>
 </div>
  <div class="col-md-4 col-0 d-none d-md-block col-sm-0 col-lg-4">
    <div class="pre" id="mo-img">
     <img src="{{asset('uploads/img/' .$detail['size_image'])}}" width="95%" height="200rem" class="mr-5 image-preview" id="myImg">
      <div class="middle">
       <div class="preview">preview</div>
      </div>
    </div>
   </div>

  </div>        

   <button class="btn btn-pro btn-block add-to-cart py-3 text-light mt-2 mt-md-3 rounded" data-id="{{$detail['id']}}" data-color="" data-size="" id="carts">Add To Cart</button>



   
  <hr>

<div class="row">
 <div class="col-md-6">
  <i class="fas fa-shipping-fast ml-2 ml-md-0"><span class="text-secondary ml-3">Fast Delivery</span></i>
    </div>
     <div class="col-md-6">
      <i class="fas fa-sync ml-2 ml-md-0"><span class="text-secondary ml-3">Free Exchange</span></i>
      
    </div>
    <div class="col-md-6 mt-3 mb-4">
      <i class="fas fa-warehouse ml-2 ml-md-0"><span class="text-secondary ml-3">100% Genuine Brand</span></i>
    </div>
  </div>
  
         </div>
      </div>
   </div>
<hr class="mt-4">
     <div class="container-fluid mt-3">
      <ul class="list-unstyled">
        <li class="list-inline-item">
          
         <h2 class="font-weight-bold ml-3 ">Reviews</h2>
        </li>
          
        
        <li class="list-inline-item float-right mr-5">
          
         <button class="btn-lg btn btn-check mt-3 text-light rounded float-right"  data-toggle="modal" data-target="#exampleModal">Write Review</button>
            
        </li>
         
         
      </ul>
     </div>

 <hr class="mt-2">
<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-3">
  @php //dd($review ); @endphp
@foreach($review as $rev)
  <div class="item ">
   <div class="card review-card">
     <div class="card-body  text-center">
        <div class="s text-center" style="width:30%; height:20%; margin: auto;">
       <img src="{{asset('uploads/img/' .$rev['image'])}}"  class="review-img">
         </div>
          <p class="n mt-5">{{ucfirst($rev['uname'])}}</p>
          <p class="n mt-3 ">
          @if($rev['rating'])
           @for($i=0; $i<5; $i++)
            @if($i<$rev['rating'])
            <span class="fa fa-star checked2 fa-lg"></span>
          @else
           <span class="fa fa-star  fa-lg"></span>
           @endif
           @endfor
           @endif
        </p>
         <p class="review-mesage mt-5">{{$rev['message']}}</p>
    
     </div>
   </div>
  </div>
   @endforeach
 </div>
</div>



     
<div class="container-fluid mt-3 mt-5">
 <h2 class="font-weight-bold ml-3 ">Related Products</h2>
</div>
 <!-- slider for populer categories -->

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($detail2 as $pro)

  <div class="item">
    <div class="card "> 
     <div class="a">
       <a href="{{url('productpage/'.$pro['id']. '/' .$pro['drop_id']) }}"> 
        @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach</a>
        <a href="{{url('productpage/'.$pro['id']. '/' .$pro['drop_id']) }}"> <p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
        @if($pro['discount'])
        <a >  <p class="overlay4 text-light">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
      @foreach($pro->stock2 as $st)
      <p class="f">{{$pro['product']}}<span class="float-right ">${{$st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['price']}}</small></del>  </span></p>
       @endforeach
       <hr>
       <div class="text-center">
        @if($pro['rating'])
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
        @endif
      </div> </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header form-review ">
        <p class=" text-light mt-3">Review This Product</p>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="" action="{{url('review')}}" method="Post">
    @csrf
    
     <input type="text" name="uname" placeholder="Name" class="form-control mt-2">
     <span class="text-danger">@error ('uname') User name Required @enderror</span>
     <input type="text" name="rating" placeholder="Your Rating" class="form-control mt-2">
     <span class="text-danger">@error ('rating') {{$message}}@enderror</span>
     <input type="hidden" name="review_id" value="{{$detail['id']}}" class="form-control mt-2">
     <textarea class="form-control mt-2 " name="message" rows="5" placeholder="Your Message"></textarea>
     <span class="text-danger">@error ('message') {{$message}}@enderror</span><br>
     <button  class="btn btn-pro py-3 rounded btn-block text-light mt-4">Send </button>
   </form>
      </div>
    
    </div>
  </div>
</div>



<div class="modal fade imgpop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-img">
        <img src="" width="100%" height="100%" id="img01">
      </div>
      
    </div>
  </div>
</div>




<script type="text/javascript">
    
    function changepic(a)
    {
      document.querySelector(".imgs").src=a.children[0].src;
       
    }
    function incr()
    {
      let a=document.getElementById('val');
       a.value++;
    }
function decr()
{
  let a=document.getElementById('val');
       a.value--;
    if (a.value<1) {
      a.value=1;
    }
}
 


</script>
 
@endsection