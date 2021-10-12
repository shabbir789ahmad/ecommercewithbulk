<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
     use SoftDeletes;
    protected $fillable=[
     'name',
     'email',
     'phone',
     'address',
     'country',
     'city',
     'zip',
     'payment',
     'user_id'
    ];
}
