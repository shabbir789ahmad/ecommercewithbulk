<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit"> -->
	<meta name="keywords" content=" bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<!-- //<link rel="preconnect" href="https://fonts.gstatic.com"> -->
	<!-- //<link rel="shortcut icon" href="img/icons/icon-48x48.png" /> -->

	<!-- //<link rel="canonical" href="https://demo-basic.adminkit.io/" /> -->
	<!-- bootstarp cdn css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Ecommerce</title>

	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="{{asset('css/admin.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		
		{{View::make('vendor.sidebar.sidebar')}}

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									
									
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{asset('img/avatars/avatar-5.jpg')}}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
								
									
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{asset('uploads/img/'.Auth::user()->image)}}" class="avatar img-fluid rounded me-1" alt="Admin name" /> <span class="text-dark">{{Auth::user()->name}}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>

							
								<a class="dropdown-item" href="{{ route('vendor.logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
       <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" class="d-hidden">
                                        @csrf
                                    </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        
        

<div id="snackbar"></div>



			@yield('content')

              {{View::make('vendor.sidebar.footer')}}
			
		</div>
	</div>

	<!-- //jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   
    <!-- fontawesome cdn js -->
   <script src="https://kit.fontawesome.com/53bfee5bd7.js" crossorigin="anonymous"></script>

   <!-- //admin panel js -->
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/getAllCategory.js')}}"></script>


<!-- switch js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>


	<!-- custome developer script -->
    <script type="text/javascript">

        //spinner loader jquery script
         var baseURL = "{{ url("") }}" + "/";
    	 $('form').submit(function()
    	  {
            
            var btn = $('#_btnSave, #_btnUpdate');
            let ph=baseURL+'img/icons/icons8-loading-circle.gif';
            btn.prop('disabled', 'true');
            btn.html(`<div class="spinner-border" role="status">
                      <span class="visually-hidden">Loading...</span>
                      </div>
                     `);

         });
    </script>
    
    <!-- get subcategory from sub category controller for all select -->
   

<button onclick="myFunction()">Show Snackbar</button>


 @if(Session()->has('success'))
<script>
 var x = document.getElementById("snackbar");
  x.className = "show";
  x.innerHTML='{{ Session('success') }}';
  x.style.backgroundColor ='#182430'
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

</script>
{{Session::forget('success')}}
  @endif

<script type="text/javascript">
		$('#print_invoice').click(function(){

    $(this).css('display','none')
    $("#myDiv").clone().appendTo("#print-me");
    window.print();
    $("#print-me").empty()
		
	})
</script>

<!-- switch product status with switch js -->
<script type="text/javascript">
	let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switchv'));

elems2.forEach(function(html) {
    let switchery = new Switchery(html,  { size: ' small' });
});
</script>


@section('script')
@show
</body>
</html>