<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $fillable=[
       'sell_name',
       'start_time',
       'end_time',
       'sell_status'
    ];
}
