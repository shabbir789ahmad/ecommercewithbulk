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
    
  });

  $('.deal').click(function(e){
    e.preventDefault();
    $('#dealupdate').modal('show')
    let id=$(this).data('id')
    $('#did').val(id);
    let name=$(this).data('name')
    $('#dname').val(name);
    let detail=$(this).data('detail')
    $('#ddetail').val(detail);
     let image=$(this).data('image')

    $('#dimage').attr('src',image);
    
    
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

  $('.deal').click(function(e){
    e.preventDefault();
    $('#exampleModal').modal('show')
    let id=$(this).data('id')
    $('#ids').val(id)
    let discount=$(this).data('discount')
    $('#disc').val(discount)
    let price=$(this).data('price')
    $('#prices').val(price)
    
  });
  $('.detail').click(function(e){
    e.preventDefault();
    $('#exampleModal').modal('show')
    let id=$(this).data('id')
    $('#detail_id').val(id)
    let discount=$(this).data('discount')
    $('#disc').val(discount)
    let sell=$(this).data('sell')
    $('#price').val(sell)
    
  });
/*
$('.maincat').on('change',function(){
      let id=$(this).val()
      if(id)
      {
         $.ajax({
           
           url : '/vendor/product/' +id,
           type : "GET",
           dataType :"json",

           success:function(sub)
           {
            $('.deal').empty()
            $('.deal').append('<option hidden disabled selected> Select Category</option>')
            $.each(sub,function(key,value){
             $('.deal').append('<option value="'+ key +'">'+ value +'</option>')
               $('.deal').css('textTransform', 'capitalize');
            });
           }

         });
      }
   
   });

  
$('.deal').on('change',function(){
       var id = $(this).val();
   
        if(id)
       {
         $.ajax({
             
              url : '/vendor/get/' +id,
              type : "GET",
              dataType : "json",
                
             success:function(data)
             {
             
             var html = '';
              $.each(data, function (i, item) {
              html += '<tr><td><input type="checkbox" name="product_id[]" value="'+item.id+'"></td><td>' + item.product + '</td><td><input type="text" name="product_price[]" value="'+item.sell_price+'"  class="w-75">  </td><td><input type="text" class="w-75" name="deal_discount[]" value="'+item.discount+'">  </td></tr>';
              });
             $('.records_table').append(html);
            }

          });
       }
                      
   });



$('.deal_ceate').click(function(e){
  e.preventDefault();
  $('#dealmodel').modal('show');

});

*/
});