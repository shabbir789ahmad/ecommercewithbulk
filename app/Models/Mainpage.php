<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainpage extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'c1',
        'c2',
        'c3',
        'tag3_id',
        'c4',
        'tag4_id',
        'c5',
        'tag5_id',
    ];
    
}
