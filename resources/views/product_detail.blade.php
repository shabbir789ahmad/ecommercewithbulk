@extends('master.master')
@section('content')

<section class="container-fluid justify-content-center d-flex " >
  <div class="card" style="width: 95%;">
  <div class="card-body">
  <div class="row" >
   <div class="col-md-5 p-0 p-md-2">
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
     <div class="rating_adn_share mt-3">
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

     <p class="text-secondary mt-3">{{$product_detail['detail']}}</p>
     <h4 class="mt-5 text-danger font-weight-bold">Rs.{{$product_detail['price']}} </h4>
     <p class="mt-1 discount "><s>Rs.{{$product_detail['price']}} </s> 90%</p>

     <div class="product_quentity">
      <h4 class="mt-3 mr-4 ">Quantity:</h4>
       <button class="quantity_minus" type="button">-</button>

       <input type="number" name="quentity" class=" " value="1" id="input">

       <button class="quantity_plus" type="button">+</button>
     </div>
       

     <div class="like_share_icon2 align-bottom mt-3">
      <div class="color">
        <p class="mb-0 discount">Color</p>
        <select >
          @foreach($product_detail->colors as $color)
          <option>{{$color['color']}}</option>
          @endforeach
        </select> 
      </div>
      <div class="color">
        <p class="mb-0 discount">Size</p>
        <select >
          @foreach($product_detail->sizes as $size)
          <option>{{$size['size']}}</option>
          @endforeach
        </select>
      </div>
     </div>  


     <div class=" align-bottom mt-5">
      <button class="btn btn-block mb-2 py-3 add_to_cart" data-id="{{$product_detail['id']}}">Add To Cart</button>
        <button class="btn btn-block buy_now mt-5 py-3">Buy Now</button> 
         
     </div>
   </div>   
   <div class="col-md-2  ">
    

  </div>
</div>
</div>
</div>
 </section> 

<section class="container-fluid justify-content-center d-flex " >
 <div class="row border " style="width: 95%;">
  <div class="col-md-8">
    <div class="card">
     <div class="card-body">
      <p class="font-weight-bold">Product Details Of {{$product_detail['product_name']}}</p>
       <ul class="ml-3 product_detail_list" >
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
       </ul>

       <p class="font-weight-bold">Product Details Of {{$product_detail['product_name']}}</p>
       <ul class="ml-3 product_detail_list" >
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
       </ul>

       <p class="font-weight-bold">Product Details Of {{$product_detail['product_name']}}</p>
       <ul class="ml-3 product_detail_list" >
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
         <li class="text-secondary">Wired Hands-Free,</li>
         <li class="text-secondary">Wired Headset</li>
         <li class="text-secondary">Hands-Free,</li>
         <li class="text-secondary">Headset,Noise-Cancellation,</li>
       </ul>


     </div>
    </div>
  </div>
  <!-- user store -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-body" style="background-color:#09192C">
        <p class="mt-4 mb-1 text-secondary font-weight-bold ">Sold By</p>
    <h5 class="d-flex font-weight-bold text-light">{{$product_detail['name']}} <a href="{{route('visit.store',['id'=>$product_detail['vendor_id']])}}" class="btn  btn-xs ml-auto">Visit Store</a></h5>
    <img src="{{asset('uploads/img/' .$product_detail['image'])}}" width="100%" height="200rem">

    <p class="mt-4 mb-1 text-light ">Service</p>
     <h6 class="d-flex mb-0 text-light"><i class="fa-brands fa-usps fa-2x"></i><span class="ml-3 mt-2">7 Days Return</span></h6>
     <p class=" mb-1 text-secondary ">Change Of Mind Not Available</p>

    
     <h6 class="d-flex mt-3 mb-0 text-light"><i class="fa-solid fa-shield-halved fa-2x"></i><span class="ml-3 mt-2">Warenty Not Available</span></h6>
     <p class=" mb-1 text-secondary ">Change Of Mind Not Available</p>
      </div>
    </div>
  </div>

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
// document.addEventListener('mouseup',function(e){
 
//   let show=document.getElementById('sh')
//   if(!show.contains(e.target)){
//     show.style.display="none"
//   }

// });



</script>
 
@endsection
@section('script')
<script type="text/javascript">


  $('.quantity_minus').click(function(){
    
    let value=$('#input').val();
    value--;
    if(value <1)
    {
      value=1;
    }
    $('#input').val(value)
  });

  $('.quantity_plus').click(function(){
    
    let value=$('#input').val();
    value++;
    
    $('#input').val(value)
  });

  $('#input').change(function(){
    
    let value=$('#input').val();
     
     if(value<1)
     {
      value=1
     }
    
    $('#input').val(value)
  });
</script>


<!-- //cart  functaionaly ajax code -->
<script type="text/javascript">
  $(".add_to_cart").click(function (e) {
        e.preventDefault();
  
         var id=$(this).data('id');
        
        $.ajax({
            url : '/add-to-cart/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
                
                quantity: $('#input').val(),
            },
           
            success: function (response , data) {
              
              
            }
        });
    // }
    });

  

  
</script>

@endsection