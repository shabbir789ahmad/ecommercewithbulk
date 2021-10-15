$(document).ready(function(){
    $('.js-switch').change(function () {

        let status = $(this).prop('checked') === true ? 1 : 0;
        let productId = $(this).data('id');
       
        $.ajax({
            type: "GET",
            dataType: "json",
            url : '/admin/product-status',
            
            data: {'product_status': status, 'id': productId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });


  $('.js-switch2').change(function () {
        let status2 = $(this).prop('checked') === true ? 1 : 0;
        let colorId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url : '/admin/color-status',
            
            data: {'color_status': status2, 'id': colorId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });

 $('.js-switch3').change(function () {
        let status3 = $(this).prop('checked') === true ? 1 : 0;
        let sizeId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url : '/admin/size-status',
            
            data: {'size_status': status3, 'id': sizeId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });

$('.js-switch4').change(function () {
        let status4 = $(this).prop('checked') === true ? 1 : 0;
        let brandId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url : '/admin/brand-status',
            
            data: {'brand_status': status4, 'id': brandId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });

 $('.js-switch5').change(function(){
    
 var status5=$(this).prop('checked')=== true ? 1 : 0;
 var stid=$(this).data('id')

  $.ajax({
    url : '/admin/stock-status' ,
    dataType : "json",
    type : "GET",
    data: {"stock_status" : status5, 'id': stid},
    success:function(data){
        console.log(data.message);
    }

  });
 });

});

