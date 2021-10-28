
function sort_by()
{
	var sort_value=$('#sort').val();

	 $('#sort2').val(sort_value)
	 $('#sort_form').submit()

}


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




function setbrand2(brand)
{
	$('#brand-sale').val(brand)
	 $('#sell_form').submit()
}

