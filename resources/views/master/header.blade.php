<?php 
use App\Models\Submenue;
$sub=Submenue::submenu();
//echo "<pre>"; print_r($sub);die;
?>


<div class=" d-none d-sm-none d-md-block d-lg-block d-xl-block" style="overflow:hidden">
  <div class="row top-nav" >
     @foreach($link as $lin)
    <div class="col-md-9 col-sm-9 col-9 col-lg-9">
       <p class="ml-2 mt-3 text-light">
     <span class="mr-2"><i class="fas fa-phone-square-alt fa-lg mr-2"></i>{{$lin['phone']}}</span> |
     <span class="ml-2"> <i class="fas fa-envelope fa-lg mr-2">
     </i>{{$lin['email']}}</span>  
       
     <span class="ml-2"> <i class="fas fa-map-marker-alt fa-lg  mr-2"></i> {{$lin['address']}}</span>
  </p>
    </div>
   
    <div class="col-md-3  col-sm-3 col-3 col-lg-3 ">
      <div class="float-right mr-2">

    <a href="{{$lin['facebook']}}" class="  text-light  rounded " target="blank">
    <i class="fab fa-facebook-square fa-lg mt-3"></i></a>

    <a href="{{$lin['instagram']}}" class=" mt-2 ml-2 text-light rounded " target="blank">
    <i class="fab fa-instagram fa-lg"></i></a>

    <a href="{{$lin['linkdin']}}" class=" mt-2 ml-2 text-light rounded " target="blank">
      <i class="fab fa-linkedin fa-lg"></i></a>

      <a href="{{$lin['twitter']}}" class=" mt-2 ml-2 text-light rounded " target="blank">
    <i class="fab fa-twitter-square fa-lg "></i></a> 

      @endforeach
    </div>
    </div>
  </div>
</div>
  
 <header >
        <div class="container con2">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                @foreach($logo as $log)
              <a href="{{url('/')}}"> <img src="{{asset('uploads/img/' .$log['logo'])}}" width="100%"></a>
              @endforeach
            </div>

    <div class="nav-btn">
     <div class="nav-links">
      <ul>
       <li class="nav-link" style="--i: .6s">
         <a href="{{url('/')}}">Home</a>
       </li>
    
      <li class="nav-link" style="--i: .85s">
       <a href="#">Women<i class="fas fa-caret-down"></i></a>
        <div class="dropdown">
       <ul>
          @foreach($sub as $su)
      @if($su['menue_id']==2)
           <li class="dropdown-link">
           <a href="#">{{ucwords($su['smenue'])}}<i class="fas fa-caret-down"></i></a>
            <div class="dropdown second">
           <ul>
             @foreach($su['dropdowns'] as $drop)
             <li class="dropdown-link">
              <a href="{{url('product/' .$drop['id'])}}">{{$drop['name']}}</a>
              </li>
               @endforeach
           
            <div class="arrow"></div>
                  </ul>
                   </div>
                  </li>
                     @endif
            @endforeach              
                   <div class="arrow"></div>
                  </ul>
                  </div>
                        </li>

        <li class="nav-link" style="--i: .85s">
      <a href="#">Men<i class="fas fa-caret-down"></i></a>
        <div class="dropdown">
       <ul>
          @foreach($sub as $su)
      @if($su['menue_id']==4)
           <li class="dropdown-link">
           <a href="#">{{ucwords($su['smenue'])}}<i class="fas fa-caret-down"></i></a>
            <div class="dropdown second">
           <ul>
             @foreach($su['dropdowns'] as $drop)
             <li class="dropdown-link">
              <a href="{{url('product/' .$drop['id'])}}">{{$drop['name']}}</a>
              </li>
               @endforeach
           
            <div class="arrow"></div>
                  </ul>
                   </div>
                  </li>
                     @endif
            @endforeach              
                   <div class="arrow"></div>
                  </ul>
                  </div>
                        </li>                 
          
        <li class="nav-link" style="--i: .85s">
      <a href="#">Kids<i class="fas fa-caret-down"></i></a>
        <div class="dropdown">
       <ul>
          @foreach($sub as $su)
      @if($su['menue_id']==3)
           <li class="dropdown-link">
           <a href="#">{{ucwords($su['smenue'])}}<i class="fas fa-caret-down"></i></a>
            <div class="dropdown second">
           <ul>
             @foreach($su['dropdowns'] as $drop)
             <li class="dropdown-link">
              <a href="{{url('product/' .$drop['id'])}}">{{$drop['name']}}</a>
              </li>
               @endforeach
           
            <div class="arrow"></div>
                  </ul>
                   </div>
                  </li>
                     @endif
            @endforeach              
                   <div class="arrow"></div>
                  </ul>
                  </div>
                        </li>   
      
                       
                    </ul>
                </div>
       
  <form class="form-inline mb-3" action="{{url('search')}}" method="GET" class="">
   <div class="input-group form-header">
    <input type="text" name="search" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" >
     <div class="input-group-append">
      <button class="btn bh text-light rounded" type="submit">Search</button>
     </div>
   </div>
  </form>
      
</div>

      <div class="icn mt-3 float-right mr-3 mr-md-0">
        
        @guest
          @if (Route::has('login'))
        <a href="{{url('login')}}">
       <i class="fas fa-user text-light  fa-2x float-right"></i>
          </a>
          @endif
          @else
            
            
          <div class="dropdownlog float-right pb-3" >
  <button class="dropbtnlog ">{{ucfirst(substr(Auth::user()->name,0,1))}}</button>
  <div class="dropdown-contentlog">
  <a href="{{url('user_dashborad')}}">Dashboard</a>
  <a href="{{ route('logout') }}"
 onclick="event.preventDefault();
 document.getElementById('logout-form').submit();">Log out
</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
     @csrf
   </form>
  </div>
</div>

         

     @endguest
          
    <a href="{{url('get-wishlist')}}">
     <div id="ex4" class="float-right ">
       <span class="p1 fa-stack fa-lg text-light has-badge" data-count="{{ count((array) session('wishlist')) }}">
       <i class=" far fa-heart fa-stack-1x xfa-inverse fa-lg" data-count="4b"></i>
       </span>
     </div>
    </a>

          <a href="{{url('cart')}}">
             <div id="ex4" class="float-right ">
          <span class="p1 fa-stack fa-lg text-light has-badge" data-count="{{ count((array) session('cart')) }}">
         <i class=" fa fa-shopping-cart fa-stack-1x xfa-inverse fa-lg" data-count="4b"></i>
       </span>
       </div>
      
          </a>
          

            </div>      
  <div class="hamburger-menu-container">
   <div class="hamburger-menu">
        <div></div>
                </div>
            </div>
           
            
        </div>
    </header>
    