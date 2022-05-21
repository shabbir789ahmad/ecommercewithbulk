<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSale extends Model
{
    use HasFactory;
    protected $fillable=[
       'sell_name',
       'start_time',
       'end_time',
       'sell_status',
       'sale_image'
    ];

    
    protected function saleName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
