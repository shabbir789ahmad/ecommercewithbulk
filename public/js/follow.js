$(document).ready(function()
{
  $(document).on('click','#follow',function(){
   
   $(this).find('span').text('Following')
   $(this).attr('id','unfollow')
    let  vendor_id=$(this).data('id');
       $.ajax({
            url: '/user/follow/vendor',
            method: "POST",
            dataType : 'json',
            data: {
                 "_token": $('#csrf-token')[0].content ,
                vendor_id: vendor_id, 
                
             
            },
           
        }).done(function(res){
           followers(vendor_id)
        });

  });


  $(document).on('click','#unfollow',function(){
   
   $(this).find('span').text('Follow')
   $(this).attr('id','follow')
      
     let  vendor_id=$(this).data('id');
    
       $.ajax({
            url: '/user/unfollow/vendor',
            method: "DELETE",
            dataType : 'json',
            data: {
                 "_token": $('#csrf-token')[0].content ,
                vendor_id: vendor_id, 
                
             
            },
           
        }).done(function(res){
           followers(vendor_id)
        });

  });



  


});