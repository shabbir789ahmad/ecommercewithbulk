<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
	<a class="sidebar-brand" href="dashboard">
        <span class="align-middle">ShabbirAhmad</span>
     </a>

	<ul class="sidebar-nav">
	   <li class="sidebar-header">
		   Pages
	   </li>

	   <li class="sidebar-item @if(request()->is('admin/dashboard')) active  @endif">
		   <a class="sidebar-link "  href="{{route('vendor.dashboard')}}">
         <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
       </a>
	   </li>
    
    <li class="sidebar-item @if(request()->is('vendor/banner')) active  @endif">
		   <a class="sidebar-link" href="{{route('banner.index')}}">
              <i class="align-middle me-2" data-feather="film"></i> <span class="align-middle">Create Banner</span>
            </a>
		</li>

		<li class="sidebar-header">
						Product & Order
					</li>


		<li class="sidebar-item">
		   <a class="sidebar-link" href="{{route('product.index')}}">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">All Product </span>
       </a>
		</li>
		<li class="sidebar-item">
		   <a class="sidebar-link" href="{{route('product.create')}}">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">Create Product </span>
       </a>
		</li>
    <li class="sidebar-item">
		   <a class="sidebar-link" href="">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">All Order </span>
       </a>
		</li>




		<li class="sidebar-header">
						Deals & Coupon
					</li>
		<li class="sidebar-item">
		   <a class="sidebar-link" href="">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">Make Deals </span>
       </a>
		</li>
		<li class="sidebar-item">
		   <a class="sidebar-link" href="{{route('coupon.index')}}">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle"> Coupons </span>
       </a>
		</li>
		<li class="sidebar-item">
		   <a class="sidebar-link" href="{{route('sales.index')}}">
		   	
         <i class="align-middle me-2" data-feather="copy"></i> <span class="align-middle">Sales </span>
       </a>
		</li>
		

   

		



					

					<li class="sidebar-header">
						Profile And User
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-buttons.html">
              <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-forms.html">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.html">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li>
				</ul>

				
			</div>
		</nav>