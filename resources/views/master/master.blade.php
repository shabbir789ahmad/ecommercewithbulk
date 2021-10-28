<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href=" {{asset('css/home.css')}}	">
<link rel="icon" href="{!! asset('pic/logo2.png') !!} " >

<link rel="stylesheet" type="text/css" href=" {{asset('css/homeproductround.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/about.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/store.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/cart.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/contact.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/product.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/track.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/header.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/searchnav.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/zoom.css')}} ">

<link rel="stylesheet" type="text/css" href=" {{asset('css/vendor.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{asset('css/style.css')}} ">
 <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
<link rel="stylesheet" type="text/css" href=" {{asset('css/design.css')}} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title></title>

</head>
<body onload="loded()">
 <div id="loading">
       
    </div>
	{{View::make('master.header')}}
  @yield('content')


  {{View::make('master.footer')}}



 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

 <script  src="{{asset('js/filter.js')}}"></script>
 <script src="{{asset('js/button.js')}}"></script> 
 <script src="{{asset('js/zoomsl.js')}}"></script> 
 <script src="{{asset('js/script.js')}}"></script> 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 @if(Session()->has('message'))
<script>
   swal.fire({
  title: ' {{ Session()->get('message') }}',
  text: "login",
  icon: "success",
  footer: '<a href="{{url('login')}}">Click to Login Here?</a>'
  
}); 
</script>
 {{ Session()->forget('message'); }}

  @endif

 @if(Session()->has('success'))
<script>
   swal.fire({
  title: ' {{ Session()->get('success') }}',
  
  icon: "success",
  
}); 
</script>
 {{ Session()->forget('success'); }}

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
        430:{
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
      var swiper = new Swiper(".mySwiper", {
       
        centeredSlides: false,
        spaceBetween: 1,
        grabCursor: true,
       
         breakpoints: {  
        '480': {
            slidesPerView: 2,
             spaceBetween: 40,},
          '640': {
             slidesPerView: 3,
             spaceBetween: 10, },
             '1000': {
             slidesPerView: 10,
             spaceBetween: 10, },
  },
        navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
              clickable: true,
        },
      });
    </script>
   
 <script type="text/javascript">
     function loded()
     {
  document.getElementById('loading').style.display="none";
     }
 </script>  

<script type="text/javascript">
    $("#click").click(function() {
  $("#nav").toggleClass("open");
  $('body').css({overflow: ($("#nav").hasClass("open") ? 'hidden' : 'scroll')});
});

    
</script>
 <script type="text/javascript">
      $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                
            });
        });
    </script>

    <script type="text/javascript">
        $(".update-wish").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.wishlist') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".ts").attr("data-id"), 
                quantity: ele.parents(".ts").find(".quan").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

  $(".remove-from-wish").click(function (e) {
        e.preventDefault();
  
        var wish = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.wish') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: wish.parents(".action").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    </script>

    <script type="text/javascript">
  
    $(".add-to-cart").click(function (e) {
        e.preventDefault();
  
         var id=$(this).data('id');
         var colors=$(this).data('color');
         var sizes=$(this).data('size');
          
        $.ajax({
            url : '/add-to-cart/' +id,
            method: "GET",
            data: {
                _token: '{{ csrf_token() }}', 
                
                color: colors,
                size: sizes,
            },
           
            success: function (response , data) {
                if(!data )
                {
                    alert ('choose color')
                }else{
                     window.location.reload();
                }
              
            }
        });
    });


    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".tr").attr("data-id"), 
                quantity: ele.parents(".tr").find(".quan").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents(".actions").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
  $('body').click(function(e) {
  if ($('.menu').hasClass('nav-btn')) {
    $(".menu").toggleClass('bar')
  }
})
</script>

</body>
</html>
