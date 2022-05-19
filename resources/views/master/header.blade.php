<?php 
use App\Models\Category;
use App\Models\Logo;
$category=Category::category();
$logo=Logo::logo();

?>

 <header >
   <div class="container con2">
     <input type="checkbox" name="" id="check">
     <div class="logo-container">
     @foreach($logo as $log)
     @if($loop->first)
         <a href="{{url('/')}}"> <img src="{{asset('uploads/img/' .$log['logo'])}}" width="100%"></a>
         @endif
     @endforeach
     </div>

    <div class="nav-btn">
     <div class="nav-links">
  <ul>
   <li class="nav-link" style="--i: .85s">
    <a href="javascript:void(0)">Category<i class="fas fa-caret-down"></i></a>
     <div class="dropdown">
      <ul>
        @foreach($category as $cat)
        <li class="dropdown-link">
         <a href="javascript:void(0)">{{ucwords($cat['category'])}}<i class="fas fa-caret-down"></i></a>
          <div class="dropdown second">
          <ul>
            @foreach($cat['categories'] as $middle)
            <li class="dropdown-link">
              <a href="{{url('product/' .$middle['id'])}}">{{ucwords($middle['middlecategory_name'])}}<i class="fas fa-caret-down"></i></a>
               <div class="dropdown second">
          <ul>

            @foreach($middle['subcategory'] as $drp)
              
            <li class="dropdown-link">
              <a href="{{url('product/' .$drp['id'])}}">{{ucwords($drp['subcategory_name'])}}</a>
            </li>
           
            @endforeach
            <div class="arrow"></div>
          </ul>
          </div>
            </li>
           
            @endforeach
             <div class="arrow"></div>
          </ul>
          </div>
        </li>
        @endforeach
        <div class="arrow"></div>
     </ul>
      
    </div>
   </li>
  </ul>
</div>
       
 
   <a href="{{url('vendor/login')}}" class="ml-sm-0 ml-md-auto mt-3 rounded">
    <button class="btn btn-sm text-light btn-color mt-1">vendor</button></a> 
   <a href="{{url('affiliate')}}" class=" mt-3 ml-1">
    <button class="btn btn-sm text-light btn-color mt-1">Affiliate</button> </a>
    <a href="{{url('/voucher')}}" class=" mt-3 ml-1">
    <button class="btn btn-sm text-light btn-color mt-1">Vouchers</button> </a>
</div>

      <div class="icn mt-3 float-right mr-3 mr-md-0">
        
        @guest
          @if (Route::has('login'))
        <a href="{{url('login')}}">
       <i class="fas fa-user text-light  fa-lg mt-3 mt-md-3 float-right"></i>
          </a>
          @endif
          @else
            
            
          <div class="dropdownlog float-right pb-3" >
  <button class="dropbtnlog ">{{ucfirst(substr(Auth::user()->name,0,1))}}</button>
  <div class="dropdown-contentlog">
  <a href="{{url('account')}}">Dashboard</a>
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
       <i class=" far fa-heart fa-stack-1x xfa-inverse " data-count="4b"></i>
       </span>
     </div>
    </a>

          <a href="{{url('cart')}}">
             <div id="ex4" class="float-right ">
          <span class="p1 fa-stack fa-lg text-light has-badge" data-count="{{ count((array) session('cart')) }}">
         <i class=" fa fa-shopping-cart fa-stack-1x xfa-inverse " data-count="4b"></i>
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
    