$(document).ready(function(){
	let i=1;
	$('#drop').change(function(){

		var drop=$(this).val()
       $('.drp').val(drop)

        $(".genrate").click(function(){

        $(".frm").clone().appendTo("#form-bulk");
          
          });
         $(".remove").click(function(){
          $(".frm").remove();
          });


        $('.form').prop('disabled', true);
         if($(this).val() != '') {
           $('.sb').prop('disabled', false);
        }
	});
 

 $('#bt').click(function(){
 	var va=$('.text')
  $('.fo').append(va)

 });

$('.scroll-to-top').click(function(e){
 e.preventDefault();
 window.scrollTo(0,0);
});
});

