<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" href="{!! asset('pic/logo2.png') !!} " >

 
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
<link href="{{asset('css/store.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="page-top " >
 
  <div id="wrapper" >
     @if(Auth::user()->deleted_at)
   <p>Your Acount has been Blocked </p>
   <button class="btn-color btn text-light">Contact Us for more Info</button>
  @else
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('pic/DenRobe.png')}}">
        </div>
        
      </a>
      <hr class="sidebar-divider my-0">
       <div class="admin-order text-light ml-3 mt-3">
        Features
      </div>
      <hr class="sidebar-divider">
     
       <li class="nav-item ">
        <a class="nav-link " href="{{url('vendor/dashboard')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Dashboard</span>
        </a>
       </li>
       @if(Auth::user()->vendor_status==0)
        <li class="nav-item ">
        <a class="nav-link " href="{{url('vendor/verify')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Verify Your Account</span>
        </a>
       </li>
      @else
       <li class="nav-item ">
        <a class="nav-link " href="{{url('vendor/store')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Your Store</span>
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-sliders-h text-light"></i>
          <span> Banner</span>
        </a>
        <div id="collapseBootstrap5" class="collapse @if(request()->is('vendor/get-banner')) show
         @elseif(request()->is('vendor/banner'))
          show
         @endif
          " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{url('vendor/get-banner')}}">All Banner</a>
            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{url('vendor/banner')}}">Upload Banner</a>
         </div>
        </div>
      </li>
      
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap12"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-sliders-h text-light"></i>
          <span>Product</span>
        </a>
        <div id="collapseBootstrap12" class="collapse @if(request()->is('vendor/stock-show')) show
         @elseif(request()->is('vendor/add-stock'))
          show
         @endif
          " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{url('vendor/stock-show')}}">All Product</a>
            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{url('vendor/add-stock')}}">Upload Product</a>
         </div>
        </div>
      </li>
      <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap9"
          aria-expanded="true" aria-controls="collapseBootstrap">
    <i class="fas fa-shuttle-van text-light"></i>
    <span>Order</span>
 </a>
 <div id="collapseBootstrap9" class="collapse @if(request()->is('vendor/orders')) show
         @elseif(request()->is('vendor/delivered'))
          show
          @elseif(request()->is('vendor/deleted-order'))
          show
         @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
  <div class=" py-2 collapse-inner rounded">
    <a class="collapse-item" href="{{url('vendor/orders')}}">Orders
    </a>
    <div class="dropdown-divider"></div>
    <a class="collapse-item" href="{{url('vendor/orders')}}">Update Order
    </a>
    <div class="dropdown-divider"></div>
    <a class="collapse-item" href="{{url('vendor/deleted-order')}}">Canceled Order
    </a>
    <div class="dropdown-divider"></div>
    <a class="collapse-item" href="{{url('vendor/delivered')}}">Delivered Order
    </a>
   </div>
 </div>
</li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap15"
          aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-bold text-light"></i>
          <span>Make Deals</span>
        </a>
        <div id="collapseBootstrap15" class="collapse @if(request()->is('vendor/all-deals')) show
         @elseif(request()->is('vendor/new-deals'))
          show
         @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('vendor/all-deals')}}">All Deals</a>
         
           <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{url('vendor/new-deals')}}">New Deal</a>
          
          </div>
        </div>
      </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap16"
          aria-expanded="true" aria-controls="collapseBootstrap">
     <i class="fas fa-bold text-light"></i>
        <span>Make Coupons</span>
    </a>
    <div id="collapseBootstrap16" class="collapse @if(request()->is('vendor/show-coupons')) show
         @elseif(request()->is('vendor/new-coupon'))
          show
         @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{url('vendor/show-coupons')}}">All Coupons</a>
         
        <div class="dropdown-divider"></div>
          <a class="collapse-item" href="{{url('vendor/new-coupon')}}">New Coupon</a>
        </div>
      </div>
   </li>
   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap14"
          aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fas fa-bold text-light"></i>
          <span>Supplier</span>
        </a>
        <div id="collapseBootstrap14" class="collapse @if(request()->is('vendor/show-supplier')) show
         @elseif(request()->is('vendor/add-supplier'))
          show
         @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('vendor/show-supplier')}}">All Supplier</a>
         
           <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{url('vendor/add-supplier')}}">Add Supplier</a>
          
          </div>
        </div>
      </li>
  
   
         <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-bold text-light"></i>
          <span>Product Brands</span>
        </a>
        <div id="collapseBootstrap2" class="collapse @if(request()->is('vendor/get-brand')) show
         @elseif(request()->is('vendor/brand'))
          show
         @endif" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('vendor/get-brand')}}">All Brand</a>
         
           <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{url('vendor/brand')}}">Brand</a>
          
          </div>
        </div>
      </li>    
     @endif
    </ul>
    @endif
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <p> @guest
          @if (Route::has('login'))
           <li class="nav-item list-inline-item ml-5 mt-1   ml-2">
         <a class="nav-link  border rounded text-light" href="{{ route('vendor.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            
                        @else
            <li class="nav-item border rounded p-2 bg-light border-danger dropdown d-block mt-2 ml-5 bookname">
         <a id="navbarDropdown" class=" bg-light dropdown-toggle  text-light mt-4" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <a href="" class="mt-5 text-dark" > {{ucwords( Auth::user()->name )}}</a>
                                </a>

  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('vendor.logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
          </a>

  <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" class="d-hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest</p>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
              
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>

                </a>
               
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter"></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{asset('pic/logo.png')}}" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
                      having.</div>
                    <div class="small text-gray-500">Udin Cilok · 58m</div>
                  </div>
                </a>
              
                 
             
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
           
            
          </ul>
        </nav>
        <!-- Topbar -->

    
     @yield('content')

          
  
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
   
  <script src="{{asset('js/select2.min.js')}}"></script>
  <script src="{{asset('js/button.js')}}"></script>  
  <script src="{{asset('js/dropdown.js')}}"></script>  
  <script src="{{asset('js/product.js')}}"></script>  
  <script src="{{asset('js/status.js')}}"></script>  
  <script src="{{asset('js/delete.js')}}"></script>  
  <script src="{{asset('js/adminfilter.js')}}"></script>  
  <script src="{{asset('js/colorpicker.js')}}"></script>  
  <script src="{{asset('js/show.js')}}"></script>  
  <script src="{{asset('js/vendor.js')}}"></script>  
  <script src="{{asset('js/jquery.multifield.min.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

 @if(Session()->has('success'))
<script>
   swal.fire({
  title: ' {{ Session('success') }}',
  text: "Upload More",
  icon: "success",
  
}); 

</script>
{{Session::forget('success')}}
  @endif
 
 <script type="text/javascript">
 $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    stagePadding: 2,
    responsive:{
        0:{
            items:1
        },
        500:{
            items:2
        },
        1000:{
            items:4
        },
         1500:{
            items:5
        }

    }
});
    </script>


<script>
  let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});

 let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switch2'));

elems2.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
 let elems3 = Array.prototype.slice.call(document.querySelectorAll('.js-switch3'));

elems3.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
 let elems4 = Array.prototype.slice.call(document.querySelectorAll('.js-switch4'));

elems4.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
let elems5 = Array.prototype.slice.call(document.querySelectorAll('.js-switch5'));
elems5.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
let elems6 = Array.prototype.slice.call(document.querySelectorAll('.js-switch6'));
elems6.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});

let elemscp = Array.prototype.slice.call(document.querySelectorAll('.js-switchcp'));
elemscp.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
$('.select2-multiple').select2({
    placeholder: " Select a Brand"
});
</script>




</body>

</html>