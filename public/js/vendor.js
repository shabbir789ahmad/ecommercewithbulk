$(document).ready(function(){
 
  $('.sle').click(function(e){
  	e.preventDefault();
  	$('#modalsale').modal('show')
  	let id=$(this).data('id')
  	$('#sid').val(id);
    $('#sid2').val(id);

    let said=$(this).data('said')
    $('#sale_id').val(said);
    $('#sale_id2').val(said);

  	let sel=$(this).data('sel')
  	$('#seller').val(sel);
    $('#seller2').val(sel);
    let desco=$(this).data('desco')
    if(desco=='')
    {
      $('#discounter').val('0');
      $('#discounter2').val('0');
    }else
    {
      $('#discounter').val(desco);
      $('#discounter2').val(desco);
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

  $('.saleupdate').click(function(e){
    $('#vendorsalemodal').modal('show')
     let id=$(this).data('id')
     $('#vid').val(id)

     let name=$(this).data('name')
     $('#vname').val(name)
    let start=$(this).data('start')
     $('#vstart').html(start)
     let end=$(this).data('end')
     $('#vend').html(end)
  });

  //form show and hide on vendor store
  $('#from1').click(function(e){
    e.preventDefault()
    $('.form1').css('display','block')
    $('.form2').css('display','none')
  });
  $('#from2').click(function(e){
    e.preventDefault()
    $('.form1').css('display','none')
    $('.form2').css('display','block')
  });
 
  $('.coupon').click(function(e){
    e.preventDefault();
    $('#modal-coupon').modal('show')
    let id=$(this).data('id')
    $('#id').val(id)
    let val=$(this).data('value')
    $('#valu').val(val)
    let min=$(this).data('min')
    $('#min_amnt').val(min)
    let exp=$(this).data('exp')
    $('#exp_dat').html(exp)
    let limit=$(this).data('limit')
    $('#limt').val(limit)
  });

 $('#check').change(function(){
     $('.check').not(this).prop('checked', this.checked);
    
 });


$('#deal').on('change',function(){
       var id = $(this).val();
   
        if(id)
       {
         $.ajax({
             
              url : '/vendor/get/' +id,
              type : "GET",
              dataType : "json",
                
             success:function(data)
             {
             
             $.each(data,function(index,value){
                    
                    $("#product").append('<input type="checkbox" value="'+value.id+'" name="id[]"  > ');
                    $("#product").append('<p class="text-danger ml-5">'+value.product+'<p>');
                    $("#product").append('<p class="text-danger ml-5">'+value.sell_price+'<p>');
                    $("#product").append('<input type="text" value="'+value.discount+'" name="id[]"  > ');
                    
                });
            }

          });
       }
                      
   });



});