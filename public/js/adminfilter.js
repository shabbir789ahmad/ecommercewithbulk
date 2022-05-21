
$(document).ready(function(){
 $('#cats').change(function(){
  var cat=$('#cats').val();
  $('#category').val(cat)
	$('#cat_form').submit()
	 

 });

$('#sub_cat').change(function(){

 var sub_cat=$('#sub_cat').val();
	$('#sub_category').val(sub_cat)
	$('#sub_form').submit()
});
	
$('#sub-order').change(function(){

 var drop=$(this).val();
 //alert (drop)
   
    $('#drop').val(drop)
    $('#drop_form').submit();
 
});

$('#status_search').change(function(){
  var stat=$(this).val();
  $('#status').val(stat);
  $('#status_form').submit();

});

$('#stock_drop').change(function(){
  var stat=$(this).val();
  $('#drop').val(stat);
  $('#drop_form').submit();

});

$('#supplier').change(function(){
  var stat=$(this).val();
  $('#supply').val(stat);
  $('#supply_form').submit();

});

$('#stock_search').change(function(){
  var stat=$(this).val();
  $('#stock1').val(stat);
   $('#stock_form').submit();

});

$('#shedule').change(function(){
  var stat=$(this).val();
  $('#sale-sh').val(stat);
   $('#form-shedul').submit();

});




});
	

