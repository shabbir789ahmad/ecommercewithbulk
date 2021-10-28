$(document).ready(function(){
 
  $('.sle').click(function(e){
  	e.preventDefault();
  	$('#modalsale').modal('show')
  	let id=$(this).data('id')
  	$('#sid').val(id);
  	let sel=$(this).data('sel')
  	$('#seller').val(sel);
    let desco=$(this).data('desco')
    if(desco=='')
    {
      $('#discounter').val('0');
    }else
    {
      $('#discounter').val(desco);
    }
    
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