<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 50%;
margin: 0 auto;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
h4{
    font-size: 2vw;
    text-align: center;
    margin-top: 3%;
}
.denrobe{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 2.5vw;
   font-weight: 600;
   color: #E86209;
 }
 .summ{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 1.2vw;
   font-weight: 600;color: #E86209;
 }
 .summ2{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 1vw;
   font-weight: 600;
   color: #E86209;
 }
 .span{
    color: #000000;
 }
 .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 1em;
    font-family: sans-serif;
    min-width: 100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #E86209;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #E86209;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #E86209;
}
.btn{
    color: #ffffff;
    background-color:#E86209;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>



</head>
<body >


<div class="card">
  <img src="https://images.unsplash.com/photo-1586810165616-94c631fc2f79?ixlib=rb-1.2.1&raw_url=true&q=80&fm=jpg&crop=entropy&cs=tinysrgb&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870" width="100%" height="300rem" />
  <div class="container">
    <h4>Your Order is On Its Way</h4> 
      

      <div class="row">
      <div class="col-md-6">
         <p class="summ text=left">SUMMARY</p>
         <p class="summ2">Order #: <span class="ml-4 span"></span></p> 
         <p class="summ2">Order Date: <span class="ml-4 span">{{date("Y/m/d, H:m:s A")}}</span></p> 
        
         <p class="summ2">Order Total: <span class="ml-4 span">{{$data['final_total']}}</span></p> 
      </div>
      <div class="col-md-6">
       <p class="summ ">SHIPPING Detail :<span class="text-dark"></span></p> 
         <p class="summ2"> Name: <span class="ml-4 span">{{$data['name']}}</span></p> 
         <p class="summ2">email: <span class="ml-4 span">{{$data['email']}}</span></p>
         <p class="summ2">Address: <span class="ml-4 span">{{$data['address']}}</span></p>
      </div>
    </div>
    <table class="styled-table">
    <thead>
        <tr>
            <th>image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
     
        <tr>

            <td><img src="{{asset('uploads/img/'.$product['image'])}}"></td>
            <td>{{ucfirst($product['name'])}}</td>
            <td>{{$product['price']}}</td>
            <td>{{$product['sub_total']}}</td>
        </tr>
       
       
    </tbody>
</table>
<a href="{{url('user_dashborad')}}"><button class="btn">Track Your Order</button></a>
  </div>
</div>

 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
