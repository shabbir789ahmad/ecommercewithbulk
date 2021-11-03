<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorSell extends Model
{
    use HasFactory;
    protected $fillable =[
     
     'sale_name',
     'sale_start',
     'sale_end',
     'sale_status'
    ];
}
