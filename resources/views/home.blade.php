@extends('master.master')
@section("content")
<title>Home</title>
  <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      @foreach($slider as $slide)
      <div class="carousel-item  @if($loop->first) active @endif caro" >
        <img class="d-block w-100" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" style="">
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


    

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 ">{{ucwords($f['c1'])}}
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
       <a href="{{'productpage/'.$pro['id']}}"> 
        @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach</a>
        <a href="{{'productpage/'.$pro['id']}}"> <p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a href="{{url('add-to-cart/'.$pro['id'])}}">  <p class="overlay4 "><i class="fa fa-shopping-cart text-light m-2 fa-lg "></i></p></a>
     </div>
     <div class="card-body">
      <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['price']}}</small></del>  </span></p>
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

      <!-- product slider-->
 <div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 ">{{ucwords($f['c2'])}}
 </h2>
 @endif
 @endforeach
</div>

  
  <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
  
  <div class="item ml-1">
    <div class="card ">
     <div class="a">
      <a href="{{'productpage/'.$pro['id']}}">
       @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
       <a href="{{'productpage/'.$pro['id']}}"> <p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a href="{{url('add-to-cart/'.$pro['id'])}}">  <p class="overlay4 "><i class="fa fa-shopping-cart text-light  m-2 fa-lg "></i></p></a>
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['price']}}</small></del>  </span></p>
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
         @else
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span>
        @endif
      </div> </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>

 <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 ">{{ucwords($f['c3'])}}
 </h2>
 @endif
 @endforeach
</div>


             <!-- slider for populer categories -->

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)

  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']}}">
         @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
         <a href="{{'productpage/'.$pro['id']}}"><p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a href="{{url('add-to-cart/'.$pro['id'])}}">  <p class="overlay4 "><i class="fa fa-shopping-cart text-light  m-2 fa-lg "></i></p></a>
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['price']}}</small></del>  </span></p>
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
         @else
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span>
        @endif
      </div> </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>

  
 

         

 

             <!-- slider for populer categories -->
 
    <!-- product slider-->

<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 ">{{ucwords($f['c4'])}}
 </h2>
 @endif
 @endforeach
</div>

  

   <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
   
  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']}}">
      @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
      </a>
       <a href="{{'productpage/'.$pro['id']}}">  <p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a href="{{url('add-to-cart/'.$pro['id'])}}">  <p class="overlay4 "><i class="fa fa-shopping-cart text-light  m-2 fa-lg "></i></p></a>
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['price']}}</small></del>  </span></p>
       <hr>
       <div class="text-center">
        @if($pro['rating'])
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star text-dark"></span> 
        @endif
         @endfor
         @else
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
        @endif
      </div> </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>

             <!-- slider for populer categories -->
 
<div class="container-fluid mt-5 ">
  @foreach($front as $f)
  @if($loop->first)
 <h2 class="font-weight-bold ml-3 ">{{ucwords($f['c5'])}}
 </h2>
 @endif
 @endforeach
</div>

  

   <div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">


  @foreach($product2 as $pro)
   
  <div class="item">
    <div class="card ">
     <div class="a">
       <a href="{{'productpage/'.$pro['id']}}">
         @foreach($pro->image as $img)
        @if($loop->first)
        <img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="...">
        @endif
       @endforeach
       </a>
       <a href="{{'productpage/'.$pro['id']}}">  <p class="overlay2 ">Quick View</p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
       <a href="{{url('add-to-cart/'.$pro['id'])}}">  <p class="overlay4 "><i class="fa fa-shopping-cart text-light  m-2 fa-lg "></i></p></a>
     </div>
     <div class="card-body">
       <p class="f">{{ucwords($pro['product'])}}<span class="float-right ">${{$pro['sell_price']}}<del class="text-secondary">
       <small class="text-danger">${{$pro['price']}}</small></del>  </span></p>
       <hr>
       <div class="text-center">
        @if($pro['rating'])
        @for($i=0; $i<5; $i++)
        @if($i<$pro['rating'])
        <span class="fa fa-star checked "></span>
        @else
        <span class="fa fa-star text-dark"></span> 
        @endif
         @endfor
         @else
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
         <span class="fa fa-star text-dark"></span> 
        @endif
      </div> </div>
    </div>
  </div>

  @endforeach
  
 
  
</div>
</div>
  @endsection 