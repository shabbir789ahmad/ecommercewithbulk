$(document).ready(function(){
 
  $('.sle').click(function(e){
  	e.preventDefault();
  	$('#modalsale').modal('show')
  	let id=$(this).data('id')
  	$('#sid').val(id);

    let said=$(this).data('said')
    $('#sale_id').val(said);

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

  

   $('#sale_count').change(function(e){
    e.preventDefault();
   
    $('#count_form').submit()
   });

   $('#order_count').change(function(e){
    e.preventDefault();
    let order_va=$(this).val()
    $('#order_counte').val(order_va)
     $('#order_form').submit()
   });

  
    $('.promote').click(function(e){
     $('#promote_model').modal('show')
     let id=$(this).data('id')
     $('#spid').val(id)
      let strt=$(this).data('strt')
     
    });
 
  $('#promoted').click(function(){
  var news=$(this).val();
 $('#promot').val(news)
 $('#new-form').submit();

});
});