$(document).ready(function(){
	
	$('#drop').change(function(){
		var drop=$('#drop').val()
       $('#ds').val(drop)
       
        
    $('#example-6').multifield({
    section: '.group',
    btnAdd:'#btnAdd-6',
    btnRemove:'.btnRemove'
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


});

