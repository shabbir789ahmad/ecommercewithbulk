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
});
