$(document).ready(function(){

$('.show_input_number').click(function(){

	$('.update_phone_number').css('display','flex')
})

  $(document).on('click','.phone_update',function(e){
    e.preventDefault()
  
   
      $.ajax({
         
         url : "/update/phone",
         type : 'PATCH',
         dataType : 'json',
         data: {
         	 "_token": $('#csrf-token')[0].content ,
            'id':$(this).data('id'),
              phone:$('#user_phone').val(),
         },
        success:function(data)
         {
            
          $('#phone_number').text(data)
          $('.update_phone_number').css('display','none')
           
            
         }
      });



   });




//update email of user

$('.show_user_email').click(function(){

	$('.update_email').css('display','flex')
})

  $(document).on('click','.email_user_update',function(e){
    e.preventDefault()
  
   
      $.ajax({
         
         url : "/update/email",
         type : 'PATCH',
         dataType : 'json',
         data: {
         	 "_token": $('#csrf-token')[0].content ,
            'id':$(this).data('id'),
              email:$('#user_email').val(),
         },
        success:function(data)
         {
            
          $('#email').text(data)
          $('.update_email').css('display','none')
           
            
         }
      });



   });


//get state for user to update address

  $(document).on('click','.get_states',function(e){
    e.preventDefault()
  
    $.ajax({
         
         url : "/states",
         type : 'get',
         dataType : 'json',
         data: {
         	 
         },
      
      }).done(function(response){

      	$('#state').empty();
      	$.each(response,function(index,value){
          
          $('#state').append(`

           <option value="${value.id}">${value.state}</option>
      		`);

      	})
      	
      })



   });


  $(document).on('change','#state',function(e){
    e.preventDefault()
  
    $.ajax({
         
         url : "/cities",
         type : 'get',
         dataType : 'json',
         data: {
         	 id:$(this).val()
         },
      
      }).done(function(response){

      	$('#city').empty();
      	$('#city').append(`
            <option option selected disabled>Select City</option>
      		`);
      	$.each(response,function(index,value){
          
          $('#city').append(`

           <option value="${value.id}">${value.city}</option>
      		`);

      	})
      	
      })



   });



//update address
$(document).on('click','.update_address',function(e){
    e.preventDefault()
  
   
      $.ajax({
         
         url : "/update/address",
         type : 'POST',
         dataType : 'json',
         data: {
         	 "_token": $('#csrf-token')[0].content ,
             'id':$(this).data('id'),
              state:$('#state').val(),
              city:$('#city').val(),
              address:$('#address').val(),
         },
        success:function(data)
         {
            
         
            
         }
      });



   });

});