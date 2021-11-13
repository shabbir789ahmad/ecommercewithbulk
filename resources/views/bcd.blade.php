<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style type="text/css">
         @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

 sidebar{
  margin: 0;
  padding: 0;
 }
 .sidebar{
  width: 20%;
  height: 100%;
  background-color: red;
  color: white;
  left: -20%;
  position: fixed;
 }
 .sidebar ul{
  display: block;
  width: 100%;
  height: 100%;
  line-height: 3vw;
 }
 .sidebar ul li{
  display: block;
  padding: 2rem 3rem;
 }
 #check{
  display: none;
 }
 #btn,#cancel{
  position: absolute;
  cursor: pointer;
 }
 #btn{
  left: 20%;
 }
 #cancel{
  left: 30%;
 }
 #check:checked ~ .sidebar{
  left: 0%;
 }
 #check:unchecked ~ .sidebar{
  left: -20%;
 }
 #check:unchecked ~ #cancel{
  opacity: 0;
 }
 #check:checked ~ .btn{
 opacity: 0;
 }
      </style>
   </head>
   <body>
      <input type="checkbox" id="check">
      <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
      </label>
        <div class="sidebar">
          <ul>
            <li>hsd</li>
            <li>hsd</li>
            <li>hsd</li>
            <li>hsd</li>
            <li>hsd</li>
          </ul>
        </div>
  
   </body>
</html>