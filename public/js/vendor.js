$(document).ready(function(){
 
  $('.sle').click(function(e){
  	e.preventDefault();
  	$('#modalsale').modal('show')
  	let id=$(this).data('id')
  	$('#sid').val(id);
  	let disc=$(this).data('disc')
  	$('#dis').val(disc);
  })

   $('.sle-end').click(function(e){
    e.preventDefault();
    $('#endsale').modal('show')
    let id=$(this).data('eid')
    $('#eid').val(id);
    let disc=$(this).data('edisc')
    $('#dis').val(disc);
    let send=$(this).data('esell')
    $('#sell-end').val(send);
  })
 
});