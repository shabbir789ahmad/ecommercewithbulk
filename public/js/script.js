$(document).ready(function () {
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });


    
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");

$('#mo-img').click(function(){
    $('.imgpop').modal('show')
  modalImg.src = img.src;
});

$('.detail').click(function(e){
  $('#detailModal').modal('show')
  let name1=$(this).data('name')
  $('.name').html(name1)
  let de=$(this).data('detail')
  $('.detalis').html(de)
});
});
