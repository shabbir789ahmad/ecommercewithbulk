$(document).ready(function(){
 
  $('#add').click(function(){

    let color=$('#color').val();
    $('#box').append('<input class="ml-2" type="text" name="color[]" value="'+color+'" style="width: 40px; height: 40px;border-radius: 50%;transition: box-shadow .3s;background: '+color+ ';cursor: pointer;border: 0;appearance: none; -webkit-appearance: none; "> ')

  });


  $('#size').click(function(){

    let siz=$('#sizes').val();
    $('#box2').append('<input class="text-center ml-2" type="text" name="size[]" value="'+siz+'" style="width: 40px; height: 40px;border-radius: 5%;transition: box-shadow .3s;background: '+color+ ';cursor: pointer;border: 2px solid black; appearance: none; -webkit-appearance: none; "> ')

  });


});