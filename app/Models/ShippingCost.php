<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;
    protected $fillable=['city','shipping_costs','state_id'];

   public static function shippings()
    {
        return ShippingCost::select('id','city','shipping_costs')->latest()->get();
    }


      public function getcityAttribute($value)
    {
        return ucfirst($value);
    }
}
