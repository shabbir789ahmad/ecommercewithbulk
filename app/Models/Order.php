<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
     
     'address',
     'state',
     'city',
     'zip',
     'payment_status',
     'user_id',
     'order_status',
    ];


    public function orders()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getorderStatusAttribute($value)
    {
        return ucfirst($value);
    }

    
}
