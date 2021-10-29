$('.btn-store').click(function(){
    let srt=$(this).val();
    $('#sort_pro').val(srt)
    $('#product_rate').submit()

});

function setcolor(color)
{
     $('#color2').val(color)
	 $('#color_form').submit()
}

function cartcolor(colo)
{
  
	 $('#carts').data('color') 
	 $('#carts').data('color', colo) 
}
function cartsize(siz)
{
  
	 $('#carts').data('size') 
	 $('#carts').data('size', siz) 
}

function setbrand(brand)
{  
    $('#brand2').val(brand)
	 $('#sort_form').submit()
}

function setsize(size)
{
   $('#size2').val(size)
	 $('#color_form').submit()
}


function newarrival()
{
   var new_value=$('#n').val();
   $('#new2').val(new_value)
	 $('#new_form').submit()
}

function newarrival2()
{
   var new_value=$('#ne').val();
   $('#new2').val(new_value)
	 $('#new_form').submit()
}

function newarrival3()
{
  	var new_value=$('#ne3').val();
    $('#new2').val(new_value)
	  $('#new_form').submit()
}

function price_filter()
{
 var price_value=$('#price1').val();
 $('#price').val(price_value)
	  $('#price_form').submit()
}

function price_filter2()
{
 
 var price_value=$('#price2').val();
$('#price').val(price_value)
	  $('#price_form').submit()
}
function price_filter3()
{
 
 var price_value=$('#price3').val();
 
$('#price').val(price_value)
	  $('#price_form').submit()
}
function price_filter4()
{
 
 var price_value=$('#price4').val();
$('#price').val(price_value)
	  $('#price_form').submit()
}


 $('#sale-new').click(function(){
   let sale_value=$(this).val();

   $('#sale-product').val(sale_value);
   $('#salee_form').submit();
 });

 $('#sale-rated').click(function(){
   let sale_value=$(this).val();

   $('#sale-rate').val(sale_value);
   $('#salee_form').submit();
 });

 $('.store-drop').click(function(){
 	   let sale_value=$(this).val();
   $('#drop_sale').val(sale_value);
   $('#drop_sale_form').submit();
 });
$('.rating').click(function(){

   let rate=$(this).data('val')
   $('#search-rate').val(rate);
   $('#rate_form').submit();
});

$('.ratings').click(function(){

   let rate=$(this).data('vals')
   $('#rate_pro').val(rate);
   $('#product_rate').submit();
});



function setbrand2(brand)
{
	$('#brand-sale').val(brand)
	 $('#sell_form').submit()
}

function setcolor2(color)
{
    $('#color-sale').val(color)
	 $('#sale_color_form').submit()
}
function setsize2(size)
{
   $('#size-sale').val(size)
	 $('#sale_color_form').submit()
}
function setbrand2(brand)
{  
    $('#brand-sale').val(brand)
	 $('#sort_form').submit()
}

function price_filters()
{
 var price_value=$('#price1').val();
 $('#sale_price').val(price_value)
	  $('#price_sale_form').submit()
}

function price_filters2()
{
 
 var price_value=$('#price2').val();
     $('#sale_price').val(price_value)
	  $('#price_sale_form').submit()
}
function price_filters3()
{
 
 var price_value=$('#price3').val();
 
   $('#sale_price').val(price_value)
	  $('#price_sale_form').submit()
}
function price_filters4()
{
 
 var price_value=$('#price4').val();
     $('#sale_price').val(price_value)
	  $('#price_sale_form').submit()
}

function newarrivals()
{
   var new_value=$('#ns').val();
   $('#new_sale').val(new_value)
	 $('#new_sale_form').submit()
}

function newarrivals2()
{
   var new_value=$('#nes').val();
   $('#new_sale').val(new_value)
	 $('#new_sale_form').submit()
}

function newarrivals3()
{
  	var new_value=$('#nes3').val();
    $('#new_sale').val(new_value)
	  $('#new_sale_form').submit()
}

