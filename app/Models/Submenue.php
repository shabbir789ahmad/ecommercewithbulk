<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenue extends Model
{
    use HasFactory; 
     
     protected $fillable=[
        'menue_id',
        'smenue'
      ];

   

    
}
