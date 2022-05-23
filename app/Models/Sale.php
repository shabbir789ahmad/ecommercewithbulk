<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable=[
       'sale_name',
       'start_time',
       'end_time',
       'sale_status',
       'sale_image',
       'admin_id',
       'vendor_id',
    ];

    
    protected function saleName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }
}
