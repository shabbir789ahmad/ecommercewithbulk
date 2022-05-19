$('.category_id').change(function(e){
    e.preventDefault()
   let id=$(this).val();
   var token =  $('input[name="csrfToken"]').attr('value'); 
      $.ajax({
         
         url : "/middl/category/ajax",
         type : 'GET',
         dataType : 'json',
         data: {
            'id':id,
              
         },
        success:function(data)
         {
            
            $('.middel_id').empty();
            $.each(data,function(index,value){
                $('.middel_id').append(`
           <option value="${value.id}">${value.middlecategory_name}</option>
           `);
            });
         
           
            
         }
      });



   });


//get subcategory
$('.middel_id').change(function(e){
    e.preventDefault()
   let id=$(this).val();
   var token =  $('input[name="csrfToken"]').attr('value'); 
      $.ajax({
         
         url : "/sub/category/ajax",
         type : 'GET',
         dataType : 'json',
         data: {
            'id':id,
              
         },
        success:function(data)
         {
            
            $('#subcategory_id').empty();
            $.each(data,function(index,value){
                $('#subcategory_id').append(`
           <option value="${value.id}">${value.subcategory_name}</option>
           `);
            });
         
           
            
         }
      });



   });