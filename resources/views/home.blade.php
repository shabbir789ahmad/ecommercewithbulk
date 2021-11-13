@extends('master.master')
@section("content")
<title>Home</title>
<!-- slider text-->
<div id="carouselslider" class="carousel slide " data-ride="carousel">
  <div class="carousel-inner">
    @foreach($slider as $slide)
    <div class="carousel-item  @if($loop->first) active @endif caro" >
     <div class="slider">
      <img class="d-block w-100" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" style="">
     </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselslider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselslider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- sale design -->
@if($sells )
 <div class="container-fluid mt-5 d-inline-block">
  <div class="sale">
   @foreach($sells as $sal)
    <h2 class="font-weight-bold ml-3 product-detail2 ">{{ucwords($sal['sell_name'])}}</h2>
    <div class="d-flex">
   <p class="ml-4 text-primary">On Sale Now
       <div id="time " class="d-flex ml-5">
        <p id="d" class="p-1 bg-primary ml-2 text-light"></p>
        <p id="h" class="p-1 bg-primary ml-2 text-light"></p>
        <p id="m" class="p-1 bg-primary ml-2 text-light"></p>
        <p id="s" class="p-1 bg-primary ml-2 text-light"></p>
       </div>
    </p>
    <a href="{{url('all-product-sale')}}" class="ml-auto py-2">
    <button class="ml-auto btn-check text-light btn btn-lg rounded">See All</button></a>
  </div>
   @endforeach
  </div>
 </div>
@endif

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
  @foreach($product2 as $pro)
  @foreach($sells as $sal)
   @if(!$pro['on_sale'] && $sal['id']==$pro['sell_id'])
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
       @if($pro['sponser'])
        <a> 
        <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered__1_-removebg-preview.png')}}" width="100%">
        </p>
       </a>
       @endif
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
  @endif
  @endforeach
  @endforeach

</div>
</div>
<!-- Deals on Store-->
<div class="container-fluid " style="background-color:#EAEDED">
 <div class="row ml-2 mr-2">
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    <p class="order-user ml-3 mt-3">Upcomming Sale</p>
    <div class="row ml-1 mr-1">
      @foreach($sell as $sale)
     <div class="col-md-6 col-6 ">
       <img src="{{asset('uploads/img/' .$sale['image'])}}" width="100%" height="80rem" class="">
       <p class="product-detail3 ml-3">{{ucwords($sale['sell_name'])}}</p>
     </div>
      @endforeach
     
    </div>
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
     @foreach($sells as $sale)
    <p class="order-user ml-3 mt-3">{{$sale['sell_name']}}</p>
    <div class="row ">
     <div class="col-md-12 col-12">
       <img src="{{asset('uploads/img/' .$sale['image'])}}" width="90%" height="215rem" class="ml-3">
      <a href="{{url('all-product-sale')}}"><p class="product-detail3 ml-3 mt-3">shop now</p></a> 
     </div>
    </div>
    @endforeach
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    <p class="order-user ml-3 mt-3">Stores With Sale</p>
    <div class="row ">
      @foreach($store as $str)
     <div class="col-md-6 col-6">
       <a href="{{url('store/'.$str['id'])}}">
       <img src="{{asset('uploads/img/' .$str['image'])}}" width="90%" class="ml-3" height="80rem"></a>
       <a href="{{url('voucher')}}"><p class="product-detail3 ml-3">See All</p></a>
     </div>
     @endforeach
     
    </div>
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    @foreach($dropdown as $drop)
    @if($loop->first)
    <p class="order-user ml-3 mt-3">{{ucwords($drop['name'])}}</p>
    <div class="row ">
     <div class="col-md-12 col-12">
       <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" width="90%" height="215rem" class="ml-3">
      <a href="{{url('product/' .$drop['id'])}}"><p class="product-detail3 ml-3 mt-3">shop now</p></a> 
     </div>
    </div>
    @endif
    @endforeach
   </div>
  </div>
 </div>
 <!-- secon row code here-->
  <div class="row ml-2 mr-2 mt-4">
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    <p class="order-user ml-3 mt-3">Shop by Category</p>
    <div class="row ml-2 mr-2">
      @foreach($dropdown->slice(0, 4) as $drop)
      
     <div class="col-md-6 col-6">
       <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" width="100%" height="80rem" >
       <p class="product-detail3 ml-3">{{$drop['name']}}</p>
     </div>
 
     @endforeach
    </div>
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    @foreach($dropdown as $drop)
    @if($loop->last)
    <p class="order-user ml-3 mt-3">{{$drop['name']}}</p>
    <div class="row ">
     <div class="col-md-12 col-12">
       <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" width="90%" height="215rem" class="ml-3">
      <a href="{{url('product/' .$drop['id'])}}"><p class="product-detail3 ml-3 mt-3">shop now</p></a> 
     </div>
    </div>
    @endif
    @endforeach
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    <p class="order-user ml-3 mt-3">Your Acount</p>
    <div class="row ">
     <div class="col-md-6 col-6">
       <img src="{{asset('pic/Fuji_Dash_GGquad_1X._SY116_CB654300275_.jpg')}}" width="90%" class="ml-3">
       <p class="product-detail3 ml-3">Hot deals</p>
     </div>
     <div class="col-md-6 col-6">
       <img src="{{asset('pic/Fuji_Dash_GGquad2_1X._SY116_CB654300275_.jpg')}}" width="90%" class="mr-3">
       <p class="product-detail3">Hot deals</p>
     </div>
    </div>
    <div class="row mt-2">
     <div class="col-md-6 col-6">
       <img src="{{asset('pic/Fuji_Dash_GGquad_1X._SY116_CB654300275_.jpg')}}" width="90%" class="ml-3">
       <p class="product-detail3 ml-3">Hot deals</p>
     </div>
     <div class="col-md-6 col-6">
       <img src="{{asset('pic/Fuji_Dash_GGquad2_1X._SY116_CB654300275_.jpg')}}" width="90%" class="mr-3">
       <p class="product-detail3">Hot deals</p>
     </div>
    </div>
   </div>
  </div>
  <div class="col-md-3 col-12">
   <div class="card shadow" style="width: 100%; height:20rem">
    @foreach($dropdown as $drop)
    @if($loop->index)
    <p class="order-user ml-3 mt-3">{{$drop['name']}}</p>
    <div class="row ">
     <div class="col-md-12 col-12">
       <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" width="90%" height="215rem" class="ml-3">
      <a href="{{url('product/' .$drop['id'])}}"><p class="product-detail3 ml-3 mt-3">shopg now</p></a> 
     </div>
    </div>
    @endif
    @endforeach
   </div>
  </div>
 </div>
</div>
<!--s sponser product design -->


 <div class="container-fluid mt-5 d-inline-block">
   <div  class="card ml-3 mr-3">
    <div class="card-body">
      <div class="sale">
        <h2 class="font-weight-bold ml-3 order-user">Sponsered</h2>
      </div>
      
      <div class="owl-carousel owl-theme ml-2">
       @foreach($product as $pro)
       @if( !$pro['sponser_status']=='1' )
        <div class="item">
         <div class="product-image">
           <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">  @foreach($pro->image as $img)
             <img  src="{{asset('uploads/img/' .$img['rimage'])}}" class="card-img-top" alt="...">
             @endforeach
            </a>
            <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>
           @if($pro['discount'])
            <p class="overlay2 text-danger">{{ceil( ($pro['discount']/$pro['sell_price'])*100)}}%</p>
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
       @endif
       @endforeach
      </div>
    </div>
  </div>
</div>




 <div class="container-fluid mt-5 bg">
   @foreach($front as $f)
   @if($loop->first)
    <h2 class="font-weight-bold ml-3 product-detail2">{{ucwords($f['c1'])}}</h2>
   @endif
   @endforeach

  </div>

<!--top sell-->

<div class="container-fluid mt-4 ">
 <div class="owl-carousel owl-theme ml-2">
 @foreach($product->chunk(2) as $pro2)
  @foreach($pro2 as $pro)
   @if( !$pro['sponser'])
   <div class="item">
     <div class="product-image">
      <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">  @foreach($pro->image as $img)
         <img  src="{{asset('uploads/img/' .$img['rimage'])}}" class="card-img-top" alt="...">
        @endforeach
      </a>

      <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>
       @if(!$pro['discount'])
        <a > <p class="overlay2 text-danger">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
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
  @endif
  @endforeach 
  @endforeach 
</div>
</div>

<div class="bg-cate pt-4  mt-4">
  <p class="feature text-center ">Featured Categories</p>
   <div class="swiper mySwiper">
      <div class="swiper-wrapper">
       @foreach($dropdown as $drop) 
       <a href="{{url('product/' .$drop['id'])}}"> 
       <div class="swiper-slide ">
        <div class="round-img" >
          <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" class="cat" >
          <p class="textc">{{$drop['name']}}</p>
        </div>
       </div>
     </a>
      @endforeach
      </div>
      <div class="swiper-button-prev text-dark"></div>
      <div class="swiper-button-next text-dark "></div>
    </div>
</div>


      <!-- product slider-->
 <div class="container-fluid mt-5 ">
   @foreach($front as $f)
    <h2 class="font-weight-bold ml-3 product-detail2 ">{{ucwords($f['c2'])}}
    </h2>
   @endforeach
 </div>
  
  <div class="container-fluid mt-4 mb-2">
   <div class="owl-carousel owl-theme ml-2">
   @foreach($product as $pro)
   @if($pro['rating'] >=0  && !$pro['sponser'])
     <div class="item">
     <div class="product-image">
      <a href="{{'productpage/'.$pro['id']. '/'.$pro['drop_id']}}">  @foreach($pro->image as $img)
         <img  src="{{asset('uploads/img/' .$img['rimage'])}}" class="card-img-top" alt="...">
        @endforeach
      </a>

      <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>
       @if(!$pro['discount'])
        <a > <p class="overlay2 text-danger">{{ceil( ($pro['discount']/$pro['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
       <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered-removebg-preview.png')}}" width="100%" height="10rem">
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
  
  @endif
  @endforeach 
</div>
</div>



 <!-- dsjksd-->
<div class="container-fluid">
   <div class="img-c">
       <div class="cl2">
        <img src="{{asset('pic/cta-bg.jpg')}}" class="">
       </div>
     <div class="middle2">
         <p class="add-txt">Fashion</p>
        <p class="psd">Mega Sale </p>
         <button class="  btn-add text-light rounded">Buy Now</button>
       </div>
</div>
</div>


 <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 product-detail2 ">{{ucwords($f['c3'])}}
 </h2>
 @endif
 @endforeach
3
</div>



<!-- slider for populer categories -->

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
  @foreach($product as $pro)
  @foreach($front as $fr)
   @if( $pro['cat_id']==$fr['tag3_id'] && !$pro['sponser'])
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
       @if($pro['sponser'])
        <a> 
        <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered__1_-removebg-preview.png')}}" width="100%">
        </p>
       </a>
       @endif
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
  @endif
  @endforeach 
  @endforeach 
</div>
</div>
 
    <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 product-detail2 ">{{ucwords($f['c4'])}}
 </h2>
 @endif
 @endforeach
 4
</div>

  
  <!---fgfg-->
  <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
  @foreach($product as $pro)
 @foreach($front as $fr)
   @if( $pro['cat_id']==$fr['tag4_id'] && !$pro['sponser'])
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
       @if($pro['sponser'])
        <a> 
        <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered__1_-removebg-preview.png')}}" width="100%">
        </p>
       </a>
       @endif
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
  @endif
  @endforeach 
  @endforeach 
</div>
</div>


             <!-- slider for populer categories -->
 
<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 product-detail2 ">{{ucwords($f['c5'])}}
 </h2>
 @endif
 @endforeach
 5
</div>

<!--fdf-->
<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
  @foreach($product as $pro)
  @foreach($front as $fr)
   @if( $pro['cat_id']==$fr['tag5_id'] && !$pro['sponser'])
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
       @if($pro['sponser'])
        <a> 
        <p class="overlay5 ">
        <img src="{{asset('pic/Sponsered__1_-removebg-preview.png')}}" width="100%">
        </p>
       </a>
       @endif
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
  @endif
  @endforeach 
  @endforeach 
</div>
</div>


<script>
 @php
 //dd($sells);
 $en='';
 $strt='';
foreach($sells as $sal)
{
  $en = strtotime($sal->end_time)*1000 ;
  $strt= strtotime($sal->start_time)*1000 ;
}
@endphp

let endtime={{ $en}};
let strttime={{ $strt}};


  var timer=setInterval(function(){
    var strt=new Date().getTime();
    if(strttime < strt )
    {
   var t=endtime-strt;

    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("d").innerHTML= ("0" + da).slice(-2) +
"<span class='d'>d</span>";

document.getElementById("h").innerHTML= ("0" + hr).slice(-2) +
"<span class='d'>h</span>";

document.getElementById("m").innerHTML= ("0" + ms).slice(-2) +
"<span class='d'>m</span>";

document.getElementById("s").innerHTML= ("0" + sc).slice(-2) +
"<span class='d'>s</span>";
    }else{

    }
  }
  },1000);
</script>

  @endsection 