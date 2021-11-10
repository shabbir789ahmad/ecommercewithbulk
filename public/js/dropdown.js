jQuery(document).ready(function ()
   {
    $('#main').on('change',function(){
       var id = $(this).val();
   
        if(id)
       {
         $.ajax({
             
              url : '/admin/get-sub-category/' +id,
              type : "GET",
              dataType : "json",
                
             success:function(sunmenue)
             {
              
             console.log(sunmenue)
             $('#sub').empty()
             $.each(sunmenue, function(key,value){
               $('#sub').append('<option disabled selected hidden>Select Category</option>')
             $('#sub').append('<option value="'+ key +'">'+ value +'</option>');
               $('#sub').css('textTransform', 'capitalize');
                });
            }

          });
       }
                      
   });


    $('#main-order').change(function(){
     
      var id=$(this).val();
      //alert (id)
      if(id)
      {
        $.ajax({
       
         url : "/admin/order-cat/" +id,
         type : "GET",
         dataType : "json",
     
       success:function(sub)
       {
        $('#sub-order').empty();
        $.each(sub, function(key,value){
          $('#sub-order').append('<option disabled hidden selected>Select Category</option>')
          $('#sub-order').append('<option value="' + key + '">'+ value +' </option>');

        });
       }
        });

      }
    });

  $('#stock_cat').change(function(){
     
     var id=$(this).val();
    
     if(id)
     {
      $.ajax({
        
         url : "/vendor/stock-cat/" +id,
         type : "GET",
         dataType : "json",

         success:function(sunmenue)
         {

          $('#stock_sub').empty();
          $.each(sunmenue,function(key,value){

        $('#stock_sub').append('<option disabled hidden selected>Select Category</option>')
          $('#stock_sub').append('<option value="' + key + '">'+ value +' </option>');

          });
         }

      });
     }
  

  });


   $('#stock_sub').change(function(){
     
      var id=$(this).val();
      //alert (id)
      if(id)
      {
        $.ajax({
       
         url : "/vendor/stock-drop/" +id,
         type : "GET",
         dataType : "json",
     
       success:function(sub)
       {
        $('#stock_drop').empty();
        $.each(sub, function(key,value){
          $('#stock_drop').append('<option disabled hidden selected>Select Category</option>')
          $('#stock_drop').append('<option value="' + key + '">'+ value +' </option>');

        });
       }
        });

      }
    });
  

$('#stock_cat2').change(function(){
     
     var id=$(this).val();
    
     if(id)
     {
      $.ajax({
        
         url : "/admin/stock-cat/" +id,
         type : "GET",
         dataType : "json",

         success:function(sunmenue)
         {

          $('#stock_sub2').empty();
          $.each(sunmenue,function(key,value){

        $('#stock_sub2').append('<option disabled hidden selected>Select Category</option>')
          $('#stock_sub2').append('<option value="' + key + '">'+ value +' </option>');

          });
         }

      });
     }
  

  });

   


});