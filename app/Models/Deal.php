<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable=[
    'deal_name',
    'deal_detail',
    'deal_price',
    'deal_image',
    'deal_end_date',
    'deal_start_date'
    ,'deal_vendor_id'
    ];
}
