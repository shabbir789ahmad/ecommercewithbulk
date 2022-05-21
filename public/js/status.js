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


});

