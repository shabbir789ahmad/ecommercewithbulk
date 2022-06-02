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

<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css">
  
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
</head>

<body id="page-top " >
  <div id="wrapper" >
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
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="fas fa-window-maximize text-light"></i>
          <span>Dashboard</span>
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-sliders-h text-light"></i>
          <span>Slider</span>
        </a>
        <div id="collapseBootstrap5" class="collapse @if(request()->is('admin/get-slider')) show
         @elseif(request()->is('admin/slider'))
          show
         @endif
          " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('slider.index')}}">All Slider</a>
            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('slider.create')}}">Upload Slider</a>
         </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap11"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-window-maximize text-light"></i>
          <span>Logo</span>
        </a>
        <div id="collapseBootstrap11" class="collapse
         @if(request()->is('logo'))
          show
         @elseif(request()->is('logo/create'))
          show
         @endif

        " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('logo.index')}}">All Logos</a>

            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('logo.create')}}">Upload Logos</a>
           

          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap16"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-window-maximize text-light"></i>
          <span>New Sale</span>
        </a>
        <div id="collapseBootstrap16" class="collapse @if(request()->is('admin/sell')) show
         @elseif(request()->is('admin/show-sale'))
          show
         @endif
         " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item @if(request()->is('admin/sell')) active @endif" href="{{url('admin/sell')}}">Make Sale</a>
             <div class="dropdown-divider"></div>
            <a class="collapse-item @if(request()->is('admin/show-sale')) active @endif" href="{{url('admin/show-sale')}}">All Sale</a>
           </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap18"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-window-maximize text-light"></i>
          <span>Brand</span>
        </a>
        <div id="collapseBootstrap18" class="collapse
         @if(request()->is('admin/brand')) show
         @elseif(request()->is('admin/brand/create'))
          show
         @endif
        " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('brand.index')}}">All Brand </a>

            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('brand.create')}}">Upload  Brand</a>
           

          </div>
        </div>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap12"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-window-maximize text-light"></i>
          <span>Main Category</span>
        </a>
        <div id="collapseBootstrap12" class="collapse
         @if(request()->is('admin/category')) show
         @elseif(request()->is('admin/category/create'))
          show
         @endif
        " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('category.index')}}">All Main Category</a>

            <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('category.create')}}">Upload Main Category</a>
           

          </div>
        </div>
      </li>
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
          aria-expanded="true" aria-controls="collapseBootstrap">
         <i class="fas fa-bars text-light"></i>
          <span>Category</span>
        </a>
        <div id="collapseBootstrap4" class="collapse
       @if(request()->is('admin/middlecategory')) show
         @elseif(request()->is('admin/middlecategory/create'))
          show
         @endif
        " aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">

          <a class="collapse-item" href="{{route('middlecategory.index')}}">All Middle Category</a>

             <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('middlecategory.create')}}">Upload Category</a>
          
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-wpforms text-light"></i>
          <span>Sub Category</span>
        </a>
        <div id="collapseForm" class="collapse @if(request()->is('admin/sub')) show
         @elseif(request()->is('admin/sub/create'))
          show
         @endif" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
           <a class="collapse-item" href="{{route('sub.index')}}">All Sub category</a>
            

             <div class="dropdown-divider"></div>
            <a class="collapse-item" href="{{route('sub.create')}}">Upload Sub category</a>
         
            
          </div>
        </div>
        
      </li>
    

    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm19" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Sizes</span>
     </a>
     <div id="collapseForm19" class="collapse
       @if(request()->is('admin/size')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('size.index')}}">All Sizes</a>
         <a class="collapse-item" href="{{route('size.create')}}">Create Sizes</a>
       </div>
      </div>
    </li>

    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm20" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Color</span>
     </a>
     <div id="collapseForm20" class="collapse
       @if(request()->is('admin/color')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('color.index')}}">All colors</a>
         <a class="collapse-item" href="{{route('color.create')}}">Create colors</a>
       </div>
      </div>
    </li>
    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm21" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Sale</span>
     </a>
     <div id="collapseForm21" class="collapse
       @if(request()->is('admin/sale')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('sale.index')}}">All Sales</a>
         <a class="collapse-item" href="{{route('sale.create')}}">Create Sale</a>
       </div>
      </div>
    </li>
     
    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm23" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>All States</span>
     </a>
     <div id="collapseForm23" class="collapse
       @if(request()->is('admin/state')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('state.index')}}">All State</a>
         <a class="collapse-item" href="{{route('state.create')}}">Create State</a>
       </div>
      </div>
    </li>
     
    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm22" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Shipping Cost</span>
     </a>
     <div id="collapseForm22" class="collapse
       @if(request()->is('admin/shipping')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('shipping.index')}}">All Shipping Cost</a>
         <a class="collapse-item" href="{{route('shipping.create')}}">Create Shipping Cost</a>
       </div>
      </div>
    </li>

    <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm2" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Vendor</span>
     </a>
     <div id="collapseForm2" class="collapse
       @if(request()->is('admin/vendor')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('all.vendor')}}">All Vendors</a>
         <a class="collapse-item" href="{{route('block.vendor')}}">Blocked Vendors</a>
       </div>
      </div>
    </li>
    <!-- <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm3" aria-expanded="true" aria-controls="collapseForm">
       <i class="fab fa-wpforms text-light"></i>
       <span>Users</span>
     </a>
     <div id="collapseForm3" class="collapse
       @if(request()->is('admin/show-user')) show
        @endif"
         aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class=" py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{url('admin/show-user')}}">All Users</a>
        <a class="collapse-item" href="{{url('admin/block-user')}}">Blocked Users</a>
       </div>
      </div>
    </li> -->

      
     
    
      
      
    </ul>
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
         <a class="nav-link  border rounded text-light" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            
                        @else
            <li class="nav-item border rounded p-2 bg-light border-danger dropdown d-block mt-2 ml-5 bookname">
         <a id="navbarDropdown" class=" bg-light dropdown-toggle  text-light mt-4" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
         <a href="" class="mt-5  text-dark " > {{ucwords( Auth::user()->name )}}</a>
                                </a>

  <div class="dropdown-menu " aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
          </a>

  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-hidden">
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

 
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script> 
  <script src="{{asset('js/jquery.multifield.min.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{asset('js/adminfilter.js')}}"></script>  
  <script src="{{asset('js/getAllCategory.js')}}"></script>


  
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
     $('.select2-multiple').select2();
  </script>

<script>
 

 let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switchv'));

elems2.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
 
let elemsu = Array.prototype.slice.call(document.querySelectorAll('.js-switchu'));

elemsu.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
let elemssa = Array.prototype.slice.call(document.querySelectorAll('.js-switchsa'));

elemssa.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});

let elemsspon = Array.prototype.slice.call(document.querySelectorAll('.js-switchspon'));

elemsspon.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});

$('.select2-multiple').select2({
    placeholder: " Select a Brand"
});
</script>


</body>

</html>