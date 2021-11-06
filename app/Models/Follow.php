<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $fillable=[
 
      'name',
      'image',
      'user_id',
      'follow_id',
      'follow',
 
    ];
}
