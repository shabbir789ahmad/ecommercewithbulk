$(document).ready(function()
{
  
   $('#main2').on('change',function(){
      let id=$(this).val()
      if(id)
      {
         $.ajax({
           
           url : '/vendor/product/' +id,
           type : "GET",
           dataType :"json",

           success:function(sub)
           {
            $('#sub2').empty()
            $('#sub2').append('<option hidden disabled selected> Select Category</option>')
            $.each(sub,function(key,value){
             $('#sub2').append('<option value="'+ key +'">'+ value +'</option>')
               $('#sub2').css('textTransform', 'capitalize');
            });
           }

         });
      }
   
   });
 

  $('#sub2').on('change',function(){
      let id=$(this).val()
      if(id)
      {
         $.ajax({
           
           url : '/vendor/product2/' +id,
           type : "GET",
           dataType :"json",

           success:function(drop)
           {
            $('#drop').empty()
            $('#drop').append('<option hidden disabled selected> Select Sub Category</option>')
            $.each(drop,function(key,value){
             $('#drop').append('<option value="'+ key +'">'+ value +'</option>')
               $('#drop').css('textTransform', 'capitalize');
            });
           }

         });
      }
   
   });

  

});

/*
 $(document).ready(function() {
  var max_fields      = 5; 
  
 
  var x = 1; 
  $('#add').click(function(e){ 
    e.preventDefault();
    if(x < max_fields){ 
      x++; 
      $('.color').append('<div class="d-flex"><input type="color" name="color[]" class="mt-2 form-control"/><a href="#" class="remove_field px-3"><i class="fas fa-times text-danger fa-2x mt-3 ml-1"></i></a></div>'); 
    }
  });
  
  $('.color').on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent('div').remove(); x--;
  })
});
*/
/*
$(document).ready(function() {
  var max_fields      = 5; 
  
 
  var x = 1; 
  $('#add2').click(function(e){ 
    e.preventDefault();
    if(x < max_fields){ 
      x++; 
      $('.size').append('<div class="d-flex"><input type="text" name="size[]" placeholder="Product Size" class="mt-2 form-control"/><a href="#" class="remove_field px-3"><i class="fas fa-times text-danger fa-2x mt-3 ml-1"></i></a></div>'); 
    }
  });
  
  $('.size').on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent('div').remove(); x--;
  })
});

*/

/*$(document).ready(function() {
  var max_fields      = 5; 
  
 
  var x = 1; 
  $('#img').click(function(e){ 
    e.preventDefault();
    if(x < max_fields){ 
      x++; 
      $('.img').append('<div><input type="file" name="rimage[]" class="mt-2 form-control"/><a href="#" class="remove_field">Remove</a></div>'); 
    }
  });
  
  $('.img').on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent('div').remove(); x--;
  })
});*/

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});