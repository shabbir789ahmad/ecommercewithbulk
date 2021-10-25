$(document).ready(function(){
 
  $('.sle').click(function(e){
  	e.preventDefault();
  	$('#modalsale').modal('show')
  	let id=$(this).data('id')
  	$('#sid').val(id);
  	let disc=$(this).data('disc')
  	$('#dis').val(disc);
  })
 
});