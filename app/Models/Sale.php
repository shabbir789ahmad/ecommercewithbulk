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

    
    public function getsaleNameAttribute($value)
    {
        return ucfirst($value);
    }
}
