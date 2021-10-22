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
        <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> <p class="overlay2 "><i class="fas fa-eye fa-lg"></i></p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 justify-content-center "><i class="far fa-heart text-danger  m-2 fa-lg "></i></p></a>

       @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay4 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
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
  <div class="owl-carousel owl-theme ml-2">
    @foreach($dropdown as $drop)
   <div class="item ml-1">
     <div class="card">
      <div class="img-c">
       <div class="cl">
        <img src="{{asset('uploads/img/' .$drop['drop_image'])}}" class="cat-imgs">
       </div>
       <div class="middle">
        <a href="{{url('product/' .$drop['id'])}}">
          <div class="text">View Detail</div>
        </a>
         
       </div>
      </div>
      <div class="card-body">
       <p class="cat-name">{{ucfirst($drop['name'])}}</p>
      </div>
    </div>
   </div>
   @endforeach
    
   
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
      <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> <p class="overlay2 "><i class="fas fa-eye fa-lg"></i></p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
        @foreach($pro->stock2 as $st)
        <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>
        @if($st['discount'])
        <a >  <p class="overlay4 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
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
 @if($f['tag3_id']==$pro['drop_id'])
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
        <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> <p class="overlay2 "><i class="fas fa-eye fa-lg"></i></p></a>
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
        <a >  <p class="overlay4 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
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
 @if($f['tag4_id']==$pro['drop_id'])
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
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> <p class="overlay2 "><i class="fas fa-eye fa-lg"></i></p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
      @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay4 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
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
 @if($f['tag5_id']==$pro['drop_id'])
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
       <a href="{{'productpage/'.$pro['id']. '/' .$pro['drop_id']}}"> <p class="overlay2 "><i class="fas fa-eye fa-lg"></i></p></a>
       <a href="{{url('wishlist/' .$pro['id'])}}">  <p class="overlay3 "><i class="far fa-heart text-danger m-2 fa-lg "></i></p></a>
      @foreach($pro->stock2 as $st)
       <a > 
        <p class="overlay5 ">
        <span class="fa fa-star text-light ">{{$pro['rating']}}</span>
        </p>
       </a>

        @if($st['discount'])
        <a >  <p class="overlay4 text-light">{{ceil( ($st['discount']/$st['sell_price'])*100)
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
  @endsection 