<?php
namespace App\classes;

/**
 * 
 */
use App\Models\AdminSale;
class NewSale 
{
	
	function get()
	{
		return AdminSale::select('sell_name','start_time','end_time','sell_status','sale_image','id')->latest()->get();

	}

    /**
     * get single sale
     */
	function singlesale()
	{
		return AdminSale::select('sell_name','start_time','end_time','sell_status','image')->where('start_time','>=')->first();

	}


}
?>