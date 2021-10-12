<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" type="text/css" href=" {{url('css/home.css')}}	">
<link rel="stylesheet" type="text/css" href=" {{url('css/responsive.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{url('css/homeproductround.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{url('css/contact.css')}} ">
<link rel="stylesheet" type="text/css" href=" {{url('css/header.css')}} ">

<style type="text/css">
    .h4{
        color: #1A8E76;
    }
    .btn-color {
         background-color: #55C0A9;
    }
    .size-form{

        height: 40rem;
        width: 100%;
        margin-top: 10%;
    }
    .header{
           background-color: #1A8E76;
    }
    .add{
           background-color: #1A8E76;
           color: white;
    }
</style>


<title></title>

</head>
<body >

  @yield('content')


 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="{{asset('js/product.js')}}"></script> 
 <script src="{{asset('js/button.js')}}"></script> 
</body>
</html>
