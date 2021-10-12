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

    public static function submenu()
    {
        $sub=Submenue::with('dropdowns')->get();
        $sub=json_decode(json_encode($sub),true);
       // echo "<pre>"; print_r($sub);die;
        return $sub;
    }

    public function dropdowns()
    {
        return $this->hasMany('\App\Models\Dropdown','dropdown_id');
    }
}
