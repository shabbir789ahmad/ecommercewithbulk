<?php 
use App\Models\Submenue;
$sub=Submenue::submenu();
//echo "<pre>"; print_r($sub);die;
?>

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
          <a href="{{url('vendor/login')}}" class="float-right">
            <button class="btn btn-sm text-light btn-color mt-1">vendor</button>
            
          </a>

            </div>      
  <div class="hamburger-menu-container">
   <div class="hamburger-menu">
        <div></div>
                </div>
            </div>
           
            
        </div>
    </header>
    