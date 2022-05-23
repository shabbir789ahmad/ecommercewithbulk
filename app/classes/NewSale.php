<?php
namespace App\classes;

/**
 * 
 */
use App\Models\Sale;
class NewSale 
{
	
	function get($vendor_id,$admin_id)
	{
		$query= Sale::select('sale_name','start_time','end_time','sale_status','sale_image','id');
        if($admin_id)
        {
        	$query=$query->where('admin_id',$admin_id);
        }
        if($vendor_id)
        {
        	$query=$query->where('vendor_id',$vendor_id);
        }

		return $sale=$query->latest()->get();

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