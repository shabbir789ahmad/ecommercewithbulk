@extends('master.master')
@section('content')
 <title>Product Detail</title>


<div class="container-fluid" style="overflow:hidden">
  <div class="row">
   <div class="col-md-6 col-12  d-none  d-md-block mt-3">
    <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-2 mt-1  ">
        @foreach($image as $d)
        <div class="ml-0"  onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" height="135rem" width="100%" class="mt-1 rounded border"  >
       </div>
       @endforeach
      </div>
      <div class="col-md-8 ">
        <div class="cont" id="mimage">
          @foreach($image as $d)
          @if($loop->first)
          <div class="img-shadow">
            <img src="{{asset('uploads/img/' .$d['rimage'])}}" width="100%"  class="block__pic  imgs ">
          </div>
          @endif
          @endforeach            
        </div>
      </div>
    </div>
   </div>
   <div class="col-12 col-md-6 d-block d-md-none " >
    <div id="carouselslider" class="carousel slide " data-ride="carousel">
     <div class="carousel-inner">
       @foreach($image as $img)
        <div class="carousel-item  @if($loop->first) active @endif caro" >
         <div class="slider">
           <img class="d-block w-100" src="{{asset('uploads/img/'.$img['rimage'])}}" alt="Firstlide" style="">
         </div>
        </div>
       @endforeach
     </div>
     <a class="carousel-control-prev bg-dark slider-pad" href="#carouselslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next bg-dark slider-pad" href="#carouselslider" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
    </div>
   </div>

   <div class="col-md-5 mt-2 mr-0 col-sm-12 ">
    <div class="row">
     <div class="col-md-12 ">
       <p class="mt-1 ml-2 ml-md-0 mt-md-4 product-name">{{ucwords($detail['product'])}}
        <span class="float-right"><a href="{{url('store/'.$detail['user_id'])}}"><button class="btn-sm btn btn-store rounded btn-check text-light">Visit Store</button></a></span>
       </p>
        <span class="text-dark ml-2 ml-md-0 mt-0"  style="font-size: 1.2rem;">
          @for($i=0; $i<5; $i++)
          @if($i<$detail['rating'])
            <span class="fa fa-star checked fa-xs"></span>
          @else
            <span class="fa fa-star fa-xs  "></span>
          @endif
          @endfor
            {{$detail['rating']}} Reviews
        </span>
        <p class="product-detail2 mt-1 mt-md-2">Rs. {{$detail['sell_price']- $detail['discoupt']}}
          <span class="product-detail text-danger">
          @if($detail['discount'])
           {{$detail['sell_price']}}
          @endif
        </span></p>
        @if(!$coupon->isEmpty())
        <div class="dropdowns " style="float:left;">
          <button class="coupon-dropbtn" onclick="show()">Get Coupon For Discount <i class="fas fa-sort-down "></i></button>
          <div class="coupon-content" id="sh" style="left:0;">
            @foreach($coupon as $coup)
            @if($coup['vendor_id']==$detail->user_id)
             <div class="cop">
              <p class="ml-2 p1">Rs. {{$coup['value']}}</p> 
               <p class="p2 ml-2 ">Minimum Spend {{$coup['min_order_amnt']}}</p> 
                <div class="d-flex mt-4">
                  <p class="p2 ml-2 ">{{$coup['exp_date']}}</p> 
                  <button class="btn btn-sm btn-check text-light ml-auto get-coupon" data-id="{{$coup['id']}}" data-code="{{$coup['code']}}"  data-vendor="{{$coup['vendor_id']}}" data-user="@if(Auth::user()) Auth::user()->id @endif">Collect</button>  
                </div>
              </div>
              <hr>
              @endif
             @endforeach
             
             </div>
         </div>
         @else
         @endif
        <hr class="bg-dark " style="margin-top: 10%;">
     </div>
     <div class="col-md-12">
      <p class=" text-dark   ml-3 ml-md-0">Color:  <br> 
       <span>
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
     <div class="col-md-12">
        <h5 class="ml-3 ml-md-0 mt-4 mt-md-3 text-dark">Size:</h5>
        <div class="d-flex mt-0 ml-3 ml-md-0 mt-md-3 mb-4">
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
     <div class="col-md-12">
       <p class="text-danger" id="message"></p>
        <button class="btn btn-pro btn-block add-to-cart py-3 text-light mt-2 mt-md-3 rounded"  data-id="{{$detail['id']}}" data-color="" data-size="" id="carts">Add To Cart</button>
     </div>
     <div class="col-md-12">
       <p  class="product-detail2 mt-3 ml-3 ml-md-0">Details
        <span class="float-right">
         <button class="btn-sm btn btn-store rounded btn-check text-light detail" data-name="{{$detail['product']}}" data-detail="{{$detail['detail']}}">Detail </button>
       </span></p>
       <p class="product-detail ml-3 ml-md-0">{{ucwords($detail['detail'])}}<span class="float-right">
        </span></p>
     </div>
    </div>
   </div>
   <div class="col-md-1 col-lg-1"></div>
 </div>
</div>
<hr class="mt-4 text-light">

<div class="container-fluid mt-3 pb-5" style="background-color:#052638">
  <ul class="list-unstyled">
   <li class="list-inline-item">
      <h2 class="font-weight-bold text-light mt-3 ml-3 ">Reviews</h2>
   </li>
   <li class="list-inline-item float-right mr-5">
    <button class="btn-lg btn btn-check mt-3 text-light rounded float-right"  data-toggle="modal" data-target="#exampleModal">Write Review</button>
    </li>
   </ul>
   <hr class="mt-2">
   <div class="owl-carousel owl-theme ml-3">
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
     <div class="product-image">
      <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">  @foreach($pro->image as $img)
         <img  src="{{asset('uploads/img/' .$img['rimage'])}}" class="card-img-top" alt="...">
        @endforeach
      </a>

      <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>
       @if($pro['discount'])
        <a > <p class="overlay2 text-danger">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
       <p class="overlay5 ">
         <img src="{{asset('pic/Sponsered__1_-removebg-preview.png')}}" width="100%">
       </p>
     </div>
     <div class="product-text d-flex mt-2">
      <p class="product-name2 ml-2">{{ucwords($pro['product'])}}</p>
      <p class="ml-auto product-name2 mr-2">Rs. {{$pro['sell_price']-$pro['discount']}}</p>
     </div>
     <div class="text-center">
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star"></span> 
        @endif
         @endfor
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
      <fieldset class="rating">
          <input type="radio" id="star5" name="rating" value="5" /><label for="star5" >5 stars</label>
          <input type="radio" id="star4" name="rating" value="4" /><label for="star4" >4 stars</label>
          <input type="radio" id="star3" name="rating" value="3" /><label for="star3" >3 stars</label>
          <input type="radio" id="star2" name="rating" value="2" /><label for="star2" >2 stars</label>
          <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
      </fieldset>
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



<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="product-detail2" style="text-transform: uppercase;"></h3>
        <p class="detalis product-detail" style="word-wrap: break-word;"></p>
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
 
function show()
{
  let show=document.getElementById('sh');
  if(show)
  {
     show.style.display="block";
   }else{
     show.style.display="none";
   }
 
}
document.addEventListener('mouseup',function(e){
 
  let show=document.getElementById('sh')
  if(!show.contains(e.target)){
    show.style.display="none"
  }

});


</script>
 
@endsection