$(document).ready(function () {
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });


    
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");

$('#mo-img').click(function(){
    $('.imgpop').modal('show')
  modalImg.src = img.src;
});

$('.detail').click(function(e){
  $('#detailModal').modal('show')
  let name1=$(this).data('name')
  $('.name').html(name1)
  let de=$(this).data('detail')
  $('.detalis').html(de)
});

$('#checkout').click(function(e){
  $('#login').modal('show');
 });
$('#loginform').click(function(e){
   e.preventDefault()
    $('#loginform').css('background','#000000')
    $('#signinform').css('background','#166387')
   $('.login_form').css('display','block')
   $('.signin_form').css('display','none')
  });
$('#signinform').click(function(e){
   e.preventDefault()
   $('#signinform').css('background','#000000')
   $('#loginform').css('background','#166387')
   $('.login_form').css('display','none')
   $('.signin_form').css('display','block')
  });



  $('.get-coupon').click(function(e){
    e.preventDefault()
   let user=$(this).data('user');
   let id=$(this).data('id');
   let code=$(this).data('code');
   let vendor=$(this).data('vendor');
   
   if(user)
   {
      var token =  $('input[name="csrfToken"]').attr('value'); 
      $.ajax({
         
         url : "/save-token",
         type : 'POST',
         dataType : 'json',
         data: {
            'id':id,
            'code':code,
            'vendor_id':vendor,
            
            "_token": $('#csrf-token')[0].content  
         },
        success:function(data)
         {
           
              window.location.reload();
         }
      });
    }else
    {
      alert ('Please login First')
    }
   
   });






});
