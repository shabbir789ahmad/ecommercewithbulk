@extends('master.master')
@section("content")
<title>Home</title>

  <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      @foreach($slider as $slide)
      <div class="carousel-item  @if($loop->first) active @endif caro" >
         
        <div class="slider">
        <img class="d-block w-100" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" style="">
        <div class="slider-colo">
         <div class="slider-text">
           <p>{{$slide['heading']}}</p>
           <button class="btn btn-sm btn-md-lg rounded btn-check text-light py-sm-0 py-md-3">Shop Now</button>
         </div>
      </div>
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


 <div class="container-fluid mt-5 d-inline-block">
  <div class="sale">
   @foreach($sale as $sal)
    <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($sal['sell_name'])}}</h2>
    <div class="d-flex">
   <p class="ml-4 text-primary">On Sale Now
       <div id="time " class="d-flex ml-5">
        <p id="d" class="p-1 bg-primary ml-2 text-light">f</p>
        <p id="h" class="p-1 bg-primary ml-2 text-light">f</p>
        <p id="m" class="p-1 bg-primary ml-2 text-light">f</p>
        <p id="s" class="p-1 bg-primary ml-2 text-light">f</p>
       </div>
    </p>
  </div>
   @endforeach
  </div>

 </div>



<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
@foreach($product as $pro)

  <div class="item">
    <div class="card ">
     <div class="a">
      <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach</a>
       
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>

       @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay2 ">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}% </p></a>
       @else
       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span>
      </p>
       @endforeach
      
        </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>



<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($f['c1'])}}
 </h2>
 @endif
 @endforeach
</div>



<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product as $pro)

  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> 
        @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach</a>
       
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>

       @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay2 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span>
      </p>
       @endforeach
      
        </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>

<div class="bg-cate pt-4  mt-4">
  <p class="feature text-center ">Featured Categories</p>

   <div class="swiper mySwiper">
      <div class="swiper-wrapper">
       @foreach($dropdown as $drop)  
     
      <div class="swiper-slide ">
        <div class="round-img" >
          <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" class="cat">
        
           <p class="textc">{{$drop['name']}}</p>
        </div>
      </div>
      
      @endforeach
        
       </div>
        <div class="swiper-button-prev text-dark"></div>
    <div class="swiper-button-next text-dark "></div>
     </div>

 
</div>


      <!-- product slider-->
 <div class="container-fluid mt-5 ">
  @foreach($front as $f)
  
 <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($f['c2'])}}
 </h2>
 @endforeach
</div>

  
  <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">
  @foreach($product3 as $pro)
  @if($pro['rating'] >=3)
  <div class="item ml-1">
    <div class="card ">
     <div class="a">
      <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}">
       @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
      
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
        @foreach($pro->stock2 as $st)
        <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>
        @if($st['discount'])
        <a >  <p class="overlay2 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
    
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span></p>
       @endforeach
      
       <hr>
        </div>
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
        <p class="psd">Mega Sale</p>
        <hr class="w-25 bg-light  ml-auto mr-auto">
         <button class="  btn-add text-light rounded">Buy Now</button>
       </div>
</div>
</div>


 <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($f['c3'])}}
 </h2>
 @endif
 @endforeach
</div>



<!-- slider for populer categories -->

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
 @foreach($front as $f)
 @if($f['tag3_id']==$pro['cat_id'])
  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}">
         @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
       
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>
      
     @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay2 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span>
      </p>
       @endforeach
    </div>
  </div>
  @endif
  @endforeach
  @endforeach
 
</div>
</div>

 
 

         

 

             <!-- slider for populer categories -->
 
    <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($f['c4'])}}
 </h2>
 @endif
 @endforeach
</div>

  

   <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
   @foreach($front as $f)
 @if($f['tag4_id']==$pro['cat_id'])
  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}">
      @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
       
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
      @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay2 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span>
      </p>
       @endforeach 
      
      
        
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
 <h2 class="font-weight-bold ml-3 keephome ">{{ucwords($f['c5'])}}
 </h2>
 @endif
 @endforeach
</div>

  

   <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
   @foreach($front as $f)
 @if($f['tag5_id']==$pro['cat_id'])
  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}">
         @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
       </a>
       
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
      @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay2 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
       }}%</p></a>
       @else
       @endif
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$st['sell_price'] - $st['discount']}}<del class="text-secondary">
       <small class="text-danger">${{$st['sell_price']}}</small></del>  </span>
      </p>
       @endforeach
    </div>
  </div>
  @endif
  @endforeach
  @endforeach
  
 
  
</div>
</div>


<script>
 @php
foreach($sale as $sal)
{
  $en =date('mdYhms', strtotime($sal->end_time)) ;
}
@endphp

var endtime={{ $en}};

 
  var timer=setInterval(function(){
  var strt=new Date().getTime();
 // alert(strt)
    var t=endtime-strt;
//alert(t)
    if(t>0)
    {
      let da = Math.floor(t / (1000 * 60 * 60 * 24));
      let hr = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let ms = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        let sc = Math.floor((t % (1000 * 60)) / 1000);

document.getElementById("d").innerHTML= ("0" + da).slice(-2) +
"<span >d</span>";

document.getElementById("h").innerHTML= ("0" + hr).slice(-2) +
"<span >h</span>";

document.getElementById("m").innerHTML= ("0" + ms).slice(-2) +
"<span >m</span>";

document.getElementById("s").innerHTML= ("0" + sc).slice(-2) +
"<span>s</span>";
    }else{

    }
  },1000);
</script>
  @endsection 