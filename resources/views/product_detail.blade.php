@extends('master.master')
@section('content')

<section class="container-fluid justify-content-center d-flex " >
  <div class="card" style="width: 95%;">
  <div class="card-body">
  <div class="row" >
   <div class="col-md-4 p-0 p-md-2">
    <div class="main_image">
      @foreach($product_detail->images as $image)
      @if($loop->first)
      <img id="mimg" src="{{asset('uploads/img/' .$image['product_image'])}}" class=" imgs mt-3 rounded " width="100%" >
   
      @endif
     @endforeach 
    </div>
    <div class="small_images">
      @foreach($product_detail->images as $image)
    
      <img  src="{{asset('uploads/img/' .$image['product_image'])}}" class="small_image  mt-1 rounded " width="100%" >
   
     @endforeach
    </div>
   </div>
   <div class="col-md-5 ">
     <div class="product_titpe mt-4">
       <h4>{{$product_detail['product_name']}}</h4>
     </div>
     <div class="rating_adn_share mt-3">
       <div class="stars">
        @for($i=0;$i<5;$i++)
        @if($i<$product_detail['rating'])
         <span class="fa fa-star checked"></span>
         @else
         <span class="fa fa-star "></span>
         @endif
         @endfor
         <span class="total_rating">{{$product_detail['rating']}} Rating</span>
       </div>

       <div class="like_share_icon">
         <i class="fa-regular fa-heart   heart_style like_by_customer" ></i>
         <i class="fa-solid fa-share-nodes  heart_style ml-2"></i>
       </div>
     </div>

     
     <h4 class="mt-5 text-danger font-weight-bold">Rs.{{$product_detail['price']}} </h4>
     <p class="mt-1 discount "><s>Rs.{{$product_detail['price']}} </s> 90%</p>
    
    <p class="font-weight-bold"><i class="fa-solid fa-boxes-stacked fa-lg"></i> In Stock</p> 

     <div class="product_quentity">
      <h4 class="mt-3  "></h4>
       <button class="quantity_minus" type="button">-</button>

       <input type="number" name="quentity" value="1" id="input">

       <button class="quantity_plus" type="button">+</button>
     </div>
       
       

     <div class="like_share_icon2 mt-5" >
      <div class="color">
        <p class="mb-0 discount">Color</p>
        <select  id="product_colors">
          @foreach($product_detail->colors as $color)
          <option>{{$color['color']}}</option>
          @endforeach
        </select> 
      </div>
      <div class="color">
        <p class="mb-0 discount">Size</p>
        <select id="product_size">
          @foreach($product_detail->sizes as $size)
          <option>{{$size['size']}}</option>
          @endforeach
        </select>
      </div>
     </div>  


     <div class=" mt-5 " >
      <button class="btn btn-block mb-2 py-3 add_to_cart" data-id="{{$product_detail['id']}}">Add To Cart</button>
        <button class="btn btn-block buy_now mt-5 py-3">Buy Now</button> 
         
     </div>
   </div>   
   <div class="col-md-3  ">
     <div class="delivery mt-4">
       <p class="discount">Delivery <span class="float-right"><i class="fa-solid fa-circle-exclamation"></i></span></p>
       <hr>
       <p class="mb-0"><i class="fa-solid fa-location-dot fa-lg"></i> <span>lahore Punjab Pakistan</span><span class="float-right"><a href="#" class="text-primary">Change</a></span></p>
       <span class="discount ml-4">1-10 Days</span>
       <hr>
       <p class="mb-0 mt-4"><i class="fa-solid fa-truck fa-lg"></i> <span>Home Delivery</span><span class="float-right">Rs.120</span></p>
       <span class="discount ml-4">1-10 Days</span>
       
       <p class="mb-0 mt-3"><i class="fa-solid fa-sack-dollar fa-lg"></i> <span>Cash on Delivery Available</span></p>
       <hr>

       <p class="discount mt-3">Services <span class="float-right"><i class="fa-solid fa-circle-exclamation"></i></span></p>
       <hr>
        <p class="mb-0 mt-3"><i class="fa-solid fa-right-left fa-lg"></i> <span>7 Day Return</span></p>
        <span class="discount ml-4">Change of mind available</span>

        <p class="mb-3 mt-3"><i class="fa-solid fa-shield-halved fa-lg"></i> <span>Warranty not available</span></p>
        
       <hr>
        

     </div>
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
      <p class="font-weight-bold">Product Detail:</p>
         <p class="text-secondary mt-3">{{$product_detail['detail']}}</p>




       <p class="font-weight-bold mt-5">Product Details Of {{$product_detail['product_name']}}</p>
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



 
@endsection
@section('script')

<script type="text/javascript">
  $('.small_image').click(function(){

   let ar=$(this).attr('src')
   $('#mimg').attr('src',ar)
   $(this).css('border','1px solid #09192C')
   $(this).siblings('.small_image').css('border','none');
  })
</script>

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
         let color=$('#product_colors').val();
         let size=$('#product_size').val();
        $.ajax({
            url : '/add-to-cart/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
                
                quantity: $('#input').val(),
                color: color,
                size: size,
            },
           
            success: function (response , data) {
              
              
            }
        });
    // }
    });

  

  
</script>

@endsection