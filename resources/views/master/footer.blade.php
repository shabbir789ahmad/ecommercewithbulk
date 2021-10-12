<div class="footers mt-5 ">
   <div class="footer pt-5">
       <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-3 text-center text-sm-center text-md-left footers-one">
                <div class="footers-logo ml-0 ml-md-4">
                    @foreach($logo as $log)
                    <img src="{{asset('uploads/img/' .$log['logo'])}}" alt="Logo" style="width:60%;" >
                    @endforeach
                </div>
                <div class="footers-info mt-3 ml-0 ml-md-4">
                    <p>DenRobe is a contemporary clothing brand known for its trend-driven styles with affordable prices.</p>
                </div>
   <div class="social-icons mb-3 ml-0 ml-md-4"> 
    @foreach($link as $lin)
    <a href="{{$lin['facebook']}}" class="  text-light  round " target="blank">
    <i class="fab fa-facebook-square fa-lg mt-3"></i></a>

    <a href="{{$lin['instagram']}}" class=" mt-2 ml-2 text-light round " target="blank">
    <i class="fab fa-instagram fa-lg"></i></a>

    <a href="" class=" mt-2 ml-2 text-light round " target="blank">
      <i class="fab fa-linkedin fa-lg"></i></a>

      <a href="{{$lin['twitter']}}" class=" mt-2 ml-2 text-light round " target="blank">
    <i class="fab fa-twitter-square fa-lg "></i></a>
    @endforeach
            </div>
            </div>
          
           <div class="col-xs-12 col-sm-12 col-md-3    mt-3 mt-md-0">
            <h5 class="ml-2 ml-md-0">Information </h5>
                <ul class="list-unstyled">
                 <li><a href="{{url('/')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Home</a></li>
                 <li><a href="{{url('login')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i> Login </a></li>
                 <li><a href="{{url('register')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Register</a></li>
                 <li><a href="{{url('about')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  About Us</a></li>
                 <li><a href="{{url('contact')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Contact Us</a></li>
                 
                 
                
                </ul>
            </div>
           <div class="col-xs-12 col-sm-12 col-md-3 footers-four ">
                <h5 class="ml-2 ml-md-0">Explore </h5>
                <ul class="list-unstyled">
                 <li><a href="{{url('cart')}}"> <i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Cart</a></li>
                 <li><a href="{{url('wishlist')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Wishlist</a></li>
                 <li><a href="{{url('/')}}"> <i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>My Account</a></li>
                 <li><a href="{{url('/')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Track Order</a></li>     
                 <li><a href="{{url('/')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  User Agreement</a></li>
                </ul>
            </div>
           <div class="col-xs-12 col-sm-12 col-md-3 footers-five ">
                <h5 class="ml-2 ml-md-0">Company </h5>
                <ul class="list-unstyled">
                 <li><a href="{{url('/')}}" > <i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Career</a></li>
                 <li><a href="{{url('/about')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Terms</a></li>
                 <li><a href="{{url('/about')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Policy</a></li>
                 <li><a href="{{url('/')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  For Parters</a></li>
                 <li><a href="c{{url('contact')}}"><i class="fas fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>  Contact Us</a></li>
                </ul>
            </div>
            
       </div>
   </div>
</div>


<div class="container-fluid  pb-3  " style="background-color:#166387;">
    <div class="row">
     <div class="col-md-6 col-sm-12 col-12">
<p class="denrobe mt-3 text-light text-sm-center text-center text-md-left ml-4 ">
   ©  <strong > Denrobe Pakistan</strong>.
</p>
     </div>
     <div class="col-md-6 col-sm-12 col-12">
        <div class="card-payment d-flex justify-content-center">
      <img src="{{asset('pic/money.png')}}" width="10%" class="mr-2 img-fluid mt-2">
      <img src="{{asset('pic/credit-card.png')}}" width="10%" height="10%" class="mr-2 img-fluid">
      <img src="{{asset('pic/american-express.png')}}" width="10%" height="10%" class="mr-2 img-fluid mt-2">
      <img src="{{asset('pic/1863.png')}}" width="10%" height="10%" class="mr-2 img-fluid mt-2">
      <img src="{{asset('pic/39181.png')}}" width="10%" height="10%" class="mr-2 img-fluid mt-2">
  </div>
     </div>
    
    </div>
 
</div>
