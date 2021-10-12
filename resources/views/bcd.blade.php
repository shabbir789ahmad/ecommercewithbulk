<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">



  <style type="text/css">
    body{background-color: #ECF0F1;}
    .main-content{background: #fff;padding-top:40px;padding-bottom: 40px;}
    .row{margin:10px 0px;}
    .footer{margin-top:40px;padding-top:20px;text-align: center;border-top:1px solid #BDC3C7;}
  </style>
</head>
<body>


<div class="container main-content">



<div id="example-6" class="content">
  <div class="row">
    <div class="col-md-12"><button type="button" id="btnAdd-6" class="btn btn-primary">Add</button></div>
  </div>
  <div class="row group">
    <div class="col-md-5">
      <div class="form-group">
      <input class="form-control" class="form-control" type="text" name="user_name[]">
      <input class="form-control" class="form-control" type="text" name="user_name[]">
      <input class="form-control" class="form-control" type="text" name="user_name[]">
      <input class="form-control" class="form-control" type="text" name="user_name[]">
      </div>
    </div>
    <div class="col-md-5">
      <input class="form-control" class="form-control" type="text" name="user_name[]">
    </div>
   
    <div class="col-md-2">
      <button type="button" id="btnAdd-6" class="btn btn-primary">Add</button>
      <button type="button" class="btn btn-danger btnRemove">rem</button>
    </div>
  </div>
</div>


</div>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery Multifield -->
<script src="{{asset('js/jquery.multifield.min.js')}}"></script>
<script>


  $('#example-6').multifield({
    section: '.group',
    btnAdd:'#btnAdd-6',
    btnRemove:'.btnRemove'
  });

</script>

</body>
</html>