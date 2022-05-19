@extends('master.master')
@section('content')

<section class="container-fluid justify-content-center d-flex" >
  <div class="row" style="width: 95%;">
   <div class="col-md-4">
    <div class="main_image">
      @foreach($product_detail->images as $image)
      @if($loop->first)
      <img id="mimg" src="{{asset('uploads/img/' .$image['product_image'])}}" class=" imgs mt-3 rounded " width="100%" >
   
      @endif
     @endforeach 
    </div>
    <div class="small_images">
      @foreach($product_detail->images as $image)
    
      <img id="mimg" src="{{asset('uploads/img/' .$image['product_image'])}}" class="  mt-1 rounded " width="100%" >
   
     @endforeach
    </div>
   </div>
   <div class="col-md-5 ">
     <div class="product_titpe mt-4">
       <h4>{{$product_detail['product_name']}}</h4>
     </div>
     <div class="rating_adn_share">
       <div class="stars">
         <span class="fa fa-star checked"></span>
         <span class="fa fa-star checked"></span>
         <span class="fa fa-star checked"></span>
         <span class="fa fa-star"></span>
         <span class="fa fa-star"></span> 
         <span class="total_rating"> 8 Rating</span>
       </div>

       <div class="like_share_icon">
         <i class="fa-regular fa-heart  heart_style like_by_customer2" ></i>
         <i class="fa-solid fa-share-nodes heart_style ml-2"></i>
       </div>
     </div>

     <p class="mt-3">Brand <span class="text-danger ">No Brand</span></p>
     <h5 class="mt-5">RS.{{$product_detail['price']}} </h5>
     <p class="mt-1"><s>RS{{$product_detail['price']}} </s> </p>
     <p class="mt-3">Color <span class="text-danger ">No Brand</span></p>
     <p class="mt-3">Size <span class="text-danger ">No Brand</span></p>
     <p class="mt-3">Quentity <span class="text-danger ">No Brand</span></p>
      
     <div class="like_share_icon align-bottom">
        <button class="btn btn-block btn-info py-3">Buy Now</button> 
        <button class="btn btn-block btn-danger py-3">Buy Now</button> 
     </div>
   </div>   
   <div class="col-md-2">
    dsf
  </div>
 </section>  

<div class="populer_text text-center mt-5">
  <h2 class="browser ">Hot Product</h2>
  <p class="br2">Properties In Most Populer Category</p>
</div>

<div class="container-fluid pb-5 pt-5 backgorund_color">
 
 <div class="owl-carousel owl-theme m-1"  >
     @foreach($products as $product)
     
    <x-card.card   :product="$product" />  
   
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
     <input type="hidden" name="review_id" value="{{$product_detail['id']}}" class="form-control mt-2">
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