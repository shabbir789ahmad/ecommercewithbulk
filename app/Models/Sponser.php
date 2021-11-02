<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponser extends Model
{
    use HasFactory;
    protected $fillable=[
        'sponser',
        'sponser_id',
        'sponser_start',
        'sponser_end',
        'sponser_status'
    ];
}
