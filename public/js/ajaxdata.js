$(document).ready(function(){


$('.follow').click(function(e){
    e.preventDefault()
   let id=$(this).data('id');
   let uid=$(this).data('uid');
   let follow_id=$(this).data('follow');
   var token =  $('input[name="csrfToken"]').attr('value'); 
      $.ajax({
         
         url : "/follow-this",
         type : 'POST',
         dataType : 'json',
         data: {
            'id':id,
            'user_id':uid,
            'follow_id':follow_id,
            "_token": $('#csrf-token')[0].content  
         },
        success:function(data)
         {
           
           alert(data['success']);
             location.reload();
         }
      });
   });
$('.unfollow').click(function(e){
    e.preventDefault()
   let id=$(this).data('id');
   let uid=$(this).data('uid');
   let follow_id=$(this).data('follow');
   var token =  $('input[name="csrfToken"]').attr('value'); 
      $.ajax({
         
         url : "/unfollow-this",
         type : 'POST',
         dataType : 'json',
         data: {
            'id':id,
            'user_id':uid,
            'follow_id':follow_id,
            "_token": $('#csrf-token')[0].content  
         },
        success:function(data)
         {
           
            window.location.reload()
         }
      });
   });


$('#cop').click(function(e){
    e.preventDefault();
    let ids=[];

    $('.check:checked').each(function()
     {
      ids.push($(this).val())
     });
  
    if(ids.length<=0)
    {
        alert ('Please select row...')
    }else{
        let check=confirm('Are sure you want to delete These')
        if(check==true)
        {
          $.ajax({
     
                 url : "/vendor/coupon-deletea",
                 dataType : "json",
                 type : 'GET',
                 data : {'id':ids},
                 success: function (response) 
                 {
                    if(data['success'])
                    {
                      window.location.reload(); 
                     }
                  }
               });
         }
       }
  
    });

 
 

});