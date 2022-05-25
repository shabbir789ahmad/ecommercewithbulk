<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable=['state'];

    
     public function getstateAttribute($value)
    {
        return ucfirst($value);
    }

    function cities()
    {
        return $this->hasMany(ShippingCost::class );
    }

   
    public static function states()
    {
      return State::all();
    }
}
