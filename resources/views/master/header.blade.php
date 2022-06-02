
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
        @foreach($cat as $categ)
        <li class="dropdown-link">
         <a href="javascript:void(0)">{{ucwords($categ['category'])}}<i class="fas fa-caret-down"></i></a>
          <div class="dropdown second">
          <ul>
          @foreach($categ['categories'] as $middel)
            <li class="dropdown-link">
              <a href="{{url('product/' .$middel['id'])}}">{{ucwords($middel['middlecategory_name'])}}<i class="fas fa-caret-down"></i></a>
               <div class="dropdown second">
          <ul>

           
               @foreach($middel['subcategory'] as $sub)
            <li class="dropdown-link">
              <a href="{{route('product.by.subcategory',['id'=>$sub['id']])}}">{{ucwords($sub['subcategory_name'])}}</a>
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
    <button class="btn btn-sm text-light btn-color mt-1">Vendor</button></a> 
   <a href="{{url('affiliate')}}" class=" mt-3 ml-1">
    <button class="btn btn-sm text-light btn-color mt-1">Affiliate</button> </a>
    <a href="{{route('all.store')}}" class=" mt-3 ml-1">
    <button class="btn btn-sm text-light btn-color mt-1">Stores</button> </a>
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
  <a href="{{route('user.index')}}">Dashboard</a>
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
          <span class="p1 fa-stack fa-lg text-light carts has-badge" data-count="">
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
    