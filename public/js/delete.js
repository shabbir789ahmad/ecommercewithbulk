$(document).ready(function(){
 
 /* $('.delete').click(function(){
  	if(!confirm('This will be Deleted Permanently')){
  		return false;
  	}
    let id = $(this).data('id');
     var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/admin/delete-color/" +id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("done");
        }
    });
  }); */

    $(document).on('click', '.btn-book', function(event) {
      $('#brand-modal').modal('show');
      var idt=$(this).data('id');
      $('#id').val(idt);
      var idt=$(this).data('brand');
      $('#brand').val(idt);
      var idt=$(this).data('status');
      $('#brand_status').val(idt);
      var idt=$(this).data('bid');
      $('#brand_id').val(idt);
    });

    $(document).on('click', '.book-size', function(event) {
     $('#size-modal').modal('show');
     var idt=$(this).data('id');
      $('#sid').val(idt);
      var idt=$(this).data('size');
      $('#size').val(idt);
      var idt=$(this).data('status');
      $('#size_status').val(idt);
      var idt=$(this).data('sid');
      $('#size_id').val(idt);
    });

    $(document).on('click', '.book-color', function(event) {
     $('#color-modal').modal('show');
     var idt=$(this).data('id');
      $('#cid').val(idt);
      var idt=$(this).data('color');
      $('#color').val(idt);
      var idt=$(this).data('status');
      $('#color_status').val(idt);
      var idt=$(this).data('filter');
      $('#filter_id').val(idt);
    });

    $('#update').click(function(){
        $('#image-modal').modal('show');
       var idi=$(this).data('imgi');
        $('#img_id').val(idi);
    });


     $('.status').click(function(){
        $('#modal-status').modal('show')
         var id=$(this).data('sid')
         $('#ids').val(id)
         
          var status=$(this).data('status')
         $('#status').val(status)
      });
   
  
    
    $('.discount').click(function(){
      $('#stock_discount').modal('show')
      var id=$(this).data('id')
      $('#dis_id').val(id)
      var dis=$(this).data('dis')
      $('#dis').val(dis)
    });
    $('.sell').click(function(){
     $('#sell_model').modal('show');
     var id=$(this).data('id');
      $('#sell_id').val(id)
      var id=$(this).data('price');
      $('#sell_price').val(id)
    });

    $('.stock').click(function(){
     $('#stock_model').modal('show');
     var id=$(this).data('id');
      $('#stock_id').val(id)
      var id=$(this).data('price');
      $('#price').val(id)
      
    });

      $('.dis').click(function(){
     $('#dis_model').modal('show');
     var id=$(this).data('id');
      $('#d_id').val(id)
      var ds=$(this).data('price');
      $('#discount').val(ds)
      
    });
       $('.stock').click(function(){
     $('#stock_model').modal('show');
     var id=$(this).data('id');
     $('#ids').val(id)
      var price=$(this).data('price');
      $('#prices').val(price)
      var stock=$(this).data('stoc');
      $('#stocks').val(stock)
      var ship=$(this).data('ship');
      $('#ships').val(ship)
      var sell=$(this).data('sell');
      $('#sells').val(sell)
      var stock_id=$(this).data('stid');
     
      $('#stock_ids').val(stock_id)
    });

     $('.colornew').click(function(){
     $('#color-modal2').modal('show');
     var id=$(this).data('id');
      $('#filter').val(id)
      
     });
       $('.sizenew').click(function(){
     $('#size-modal2').modal('show');
     var id=$(this).data('id');

      $('#sizen').val(id)
      
    });
   
    $('.brandnew').click(function(){
     $('#brand-modal2').modal('show');
     var id=$(this).data('id');
      $('#br').val(id)
      
    });
    $('.bann').click(function(e){

        e.preventDefault();
        $('#banner').modal('show');
        let id=$(this).data('id')
        $('#idb').val(id)
        let h1=$(this).data('h1')
        $('#head1').val(h1)
        let h2=$(this).data('h2')
        $('#head2').val(h2)
    });
    $('.sale').click(function(e){
        e.preventDefault();
        $('#salemodal').modal('show')
        let id=$(this).data('id')
        $('#sid').val(id)
        let name=$(this).data('name')
        $('#sell').val(name)
        let start=$(this).data('start')
        $('#strt').val(start)
        
        let end=$(this).data('end')
        $('#en').val(end)
    });

    $('.sponser').click(function(e){
     $('#sopnser_modal').modal('show')
     let id=$(this).data('id')
     $('#sid').val(id)
      let strt=$(this).data('strt')
     $('#sponser_start').val(strt)
     let send=$(this).data('send')
     $('#sponser_end').html(send)
     $('#sponser_end2').val(send)
    });
    

     

});